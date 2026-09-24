<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_pricing_tiers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_request_id')->constrained('quote_requests')->cascadeOnDelete();
            $table->unsignedTinyInteger('tier_number');
            $table->unsignedInteger('quantity');
            $table->decimal('discount_percent', 5, 2)->default(0);
            $table->decimal('unit_price', 12, 2)->default(0);
            $table->decimal('total_price', 14, 2)->default(0);
            $table->timestamps();
            $table->unique(['quote_request_id', 'tier_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_pricing_tiers');
    }
};
