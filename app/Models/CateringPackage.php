<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CateringPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'thumbnail', 'about', 'is_popular', 'category_id', 'city_id', 'kitchen_id'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function kitchen(): BelongsTo
    {
        return $this->belongsTo(Kitchen::class);
    }
    public function photos(): HasMany
    {
        return $this->hasMany(CateringPhoto::class);
    }
    public function testimonials(): HasMany
    {
        return $this->hasMany(CateringTestimonial::class);
    }
    public function bonuses(): HasMany
    {
        return $this->hasMany(CateringBonus::class);
    }
    public function tiers(): HasMany
    {
        return $this->hasMany(CateringTier::class);
    }
}
