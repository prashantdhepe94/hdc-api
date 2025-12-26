<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class Event extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'school_type_id',
        'title',
        'short_description',
        'description',
        'start_date',
        'end_date',
        'is_published',
        'published_at',
        'user_id',
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
        static::creating(function ($event)
        {
            $event['user_id'] = Auth::user()->id;
        });
    }
}
