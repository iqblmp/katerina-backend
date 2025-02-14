<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catering_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('booking_trx-id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('delivery_time');
            $table->string('proof');
            $table->string('post_code');
            $table->string('city');
            $table->string('notes');
            $table->string('address');
            $table->unsignedBigInteger('total_amount');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('duration');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('total_tax_amount');
            $table->boolean('is_paid');
            $table->date('started_at');
            $table->date('ended_at');
            $table->foreignId('catering_package_id')->constrained()->cascadeOnDelete();
            $table->foreignId('catering_tier_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catering_subscriptions');
    }
};
