<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_type_id',
        'std',
        'section_name',
        'strength',
        'image',
        'user_id'
    ];

    protected $casts = [
        'image' => 'array',
    ];

    public function school_type(): BelongsTo
    {
        return $this->belongsTo(SchoolType::class);
    }

    public function standard_type(): BelongsTo
    {
        return $this->belongsTo(StandardType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
