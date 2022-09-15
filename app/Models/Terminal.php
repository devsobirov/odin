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

    public function signedIn(): bool
    {
        return $this->update(['lastauth_at' => now()]);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
