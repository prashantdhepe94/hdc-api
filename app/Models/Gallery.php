<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['school_type_id', 'published_at', 'media_type', 'media_path', 'youtube_url'];

    protected $casts = [
        'media_path' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($gallery) {
            \Log::info('Image path:', [$gallery->image_path]);
        });
    }

    public function school_type(): BelongsTo
    {
        return $this->belongsTo(SchoolType::class);
    }

}
