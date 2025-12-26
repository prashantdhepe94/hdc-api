<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class Post extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string[]
     */
    protected $fillable = [
        'school_type_id',
        'post_category_id',
        'user_id',
        'title',
        'slug',
        'short_description',
        'content',
        'published_at',
        'media_galleries',
        'media_gallery_original_filenames'
    ];

    protected $casts = [
        'media_galleries' => 'array',
        'media_gallery_original_filenames' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function school_type(): BelongsTo
    {
        return $this->belongsTo(SchoolType::class);
    }

    /**
     * @return BelongsTo
     */
    public function post_category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "boot" method of the model.
     *
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($post)
        {
            $post['user_id'] = Auth::user()->id;
        });
    }

}
