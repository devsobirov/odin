<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Terminal extends Authenticatable
{
    use HasFactory;

    protected $table = 'terminals';

    protected $guarded = [];

    protected $hidden = ['password', 'remember_token',];

    protected $casts = [ 'lastauth_at' => 'datetime'];

    public function signedIn(): bool
    {
        return $this->update(['lastauth_at' => now()]);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public static function getForProjectOrCreate($id = null): Terminal
    {
        if ($id) {
            $terminal= self::where('id', $id)
                ->where('project_id', auth()->guard('project')->id())
                ->first();
            abort_if(!$terminal, 404);
            return $terminal;
        }
        return new self();
    }

    public function visitedAt(): string
    {
        if ($this->lastauth_at) {
            return $this->lastauth_at->format('M/d/Y H:i');
        }
        return '-';
    }
}
