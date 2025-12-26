<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 */
class MediaGallery extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = ['school_type_id', 'post_id', 'directory'];

    /**
     * @return BelongsTo
     */
    public function school_type(): BelongsTo
    {
        return $this->belongsTo(SchoolType::class);
    }

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
