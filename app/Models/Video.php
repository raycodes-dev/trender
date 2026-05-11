<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Video extends Model
{
    protected $fillable = [
        'creator_id',
        'video_link',
        'video_path',
        'thumbnail_link'
    ];
    /**
     * Get the creator that owns the video.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Creator::class);
    }
}
