<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TierBenefit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'catering_tier_id'];
}
