<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_pricings', function (Blueprint $table) {
            $table->decimal('electricity_cost', 12, 2)->default(0)->after('overhead_cost');
            $table->decimal('waste_cost', 12, 2)->default(0)->after('electricity_cost');
        });
    }

    public function down(): void
    {
        Schema::table('quote_pricings', function (Blueprint $table) {
            $table->dropColumn(['electricity_cost', 'waste_cost']);
        });
    }
};
