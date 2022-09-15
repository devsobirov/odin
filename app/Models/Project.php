<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Project extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'projects';

    protected $guarded = [];

    protected $hidden = ['password'];

    public function terminals(): HasMany
    {
        return $this->hasMany(Terminal::class, 'project_id');
    }
}
