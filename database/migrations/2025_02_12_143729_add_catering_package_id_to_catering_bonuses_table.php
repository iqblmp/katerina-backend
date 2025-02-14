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
        Schema::table('catering_bonuses', function (Blueprint $table) {
            //
            $table->foreignId('catering_package_id')
                ->constrained()
                ->cascadeOnDelete()
                ->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('catering_bonuses', function (Blueprint $table) {
            //
            $table->dropForeign(['catering_package_id']);
            $table->dropColumn('catering_package_id');
        });
    }
};
