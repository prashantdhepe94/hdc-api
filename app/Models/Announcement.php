<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_type_id',
        'start_date',
        'end_date',
        'published_at',
        'is_active',
        'content',
        'short_description',
        'user_id',
        ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'published_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * @return BelongsTo
     */
    public function school_type(): BelongsTo
    {
        return $this->belongsTo(SchoolType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(function ($announcement) {
            $announcement['user_id'] = Auth::user()->id;
        });
    }
}
