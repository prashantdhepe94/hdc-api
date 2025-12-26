<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
class Staff extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'school_type_id',
        'staff_type_id',
        'name',
        'mobile_no',
        'address',
        'qualification',
        'teaching_as',
        'date_of_joining',
        'is_salaried',
        'photo'
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
    public function staff_type(): BelongsTo
    {
        return $this->belongsTo(StaffType::class);
    }
}
