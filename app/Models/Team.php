<?php
// app/Models/Team.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Team extends Model
{
    protected $fillable = ['name', 'owner_id'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('is_accepted')->withTimestamps();
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
