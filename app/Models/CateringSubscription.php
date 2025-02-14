<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CateringSubscription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'booking_trx-id',
        'name',
        'phone',
        'email',
        'delivery_time',
        'proof',
        'post_code',
        'city',
        'notes',
        'address',
        'total_amount',
        'price',
        'duration',
        'quantity',
        'total_tax_amount',
        'is_paid',
        'started_at',
        'ended_at',
        'catering_package_id',
        'catering_tier_id'
    ];

    //mengubah tipe data started_at dan ended_at
    protected $cast = [
        'started_at' => 'date',
        'ended_at' => 'date'
    ];

    //generate unique booking_trx-id
    public static function generateUniqueTrxId()
    {
        $prefix = 'CT';
        do {
            $randomString = $prefix . mt_rand(1000, 9999);
        } while (self::where('booking_trx-id', $randomString)->exists());

        return $randomString;
    }

    //realationship
    public function cateringPackage(): BelongsTo
    {
        return $this->belongsTo(CateringPackage::class);
    }

    public function caterTier(): BelongsTo
    {
        return $this->belongsTo(CateringTier::class);
    }
}
