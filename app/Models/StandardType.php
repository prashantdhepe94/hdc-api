<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StandardType extends Model
{
    use HasFactory;

    protected $fillable = ['std', 'section_name'];

    public function standard(): HasMany
    {
        return $this->hasMany(Standard::class);
    }
}
