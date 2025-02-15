<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\CateringTier;
use Illuminate\Http\Request;
use App\Models\CateringPackage;
use App\Http\Controllers\Controller;
use App\Models\CateringSubscription;
use App\Http\Requests\StoreCateringSubscribeRequest;
use App\Http\Resources\Api\CateringSubscriptionApiResource;

class CateringSubscriptionController extends Controller
{
    //
    public function store(StoreCateringSubscribeRequest $request)
    {
        $validateData = $request->validated();
        $cateringPackage = CateringPackage::find($validateData['catering_package_id']);

        if (!$cateringPackage) {
            return response()->json(['message' => 'Catering Package not found'], 404);
        }

        $cateringTier = CateringTier::find($validateData['catering_tier_id']);

        if (!$cateringTier) {
            return response()->json(['message' => 'Tier package not found, please choose the existing tiers available'], 404);
        }

        if ($request->hasFile('proof')) {
            $filePath = $request->file('proof')->store('payment/proof', 'public');
            $validateData['proof'] = $filePath;
        }

        $startedAt = Carbon::parse($validateData['started_at']);
        $endedAt = $startedAt->copy()->addDays($cateringTier->duration);

        $price = $cateringTier->price;
        $tax = 0.11;
        $totalTax = $tax * $price;
        $grandTotal = $price + $tax;

        $validateData['price'] = $price;
        $validateData['total_tax_amount'] = $totalTax;
        $validateData['total_amount'] = $grandTotal;

        $validateData['quantity'] = $cateringTier->quantity;
        $validateData['duration'] = $cateringTier->duration;
        $validateData['city'] = $cateringPackage->city->name;
        $validateData['delivery_time'] = "Launch time";

        $validateData['started_at'] = $startedAt->format('Y-m-d');
        $validateData['ended_at'] = $endedAt->format('Y-m-d');

        $validateData['is_paid'] = false;

        $validateData['booking_trx-id'] = CateringSubscription::generateUniqueTrxId();

        $bookingTransaction = CateringSubscription::create($validateData);

        $bookingTransaction->load('cateringPackage', 'cateringTier');

        return new CateringSubscriptionApiResource($bookingTransaction);
    }

    public function booking_details(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'booking_trx-id' => 'required|string'
        ]);

        $booking = CateringSubscription::where('phone', $request->phone)
            ->where('booking_trx-id', $request->input('booking_trx-id'))
            ->with([
                'cateringPackage',
                'cateringPackage.kitchen',
                'cateringPackage.category',
                'cateringPackage.city',
                'cateringTier',
            ])
            ->first();

        if (!$booking) {
            return response()->json(['message' => ['Booking not found',]], 404);
        }
        return new CateringSubscriptionApiResource($booking);
    }
}
