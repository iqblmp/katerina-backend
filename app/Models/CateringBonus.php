<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CateringBonus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
        'category_id',
        'catering_package_id'

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cateringPackage(): BelongsTo
    {
        return $this->belongsTo(CateringPackage::class);
    }
}
