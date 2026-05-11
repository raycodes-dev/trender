<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Creator extends Model
{
    // Tells Laravel to treat these as arrays/objects automatically
    protected $fillable = ['user_id', 'role', 'tags', 'biography', 'experience', 'profile_picture'];

    protected $casts = [
        'tags' => 'array',
        'experience' => 'array',
    ];

    /**
     * Get the user that owns the creator profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the videos for the creator.
     */
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}
