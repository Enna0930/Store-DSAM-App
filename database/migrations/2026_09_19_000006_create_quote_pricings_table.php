<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_pricings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_request_id')->unique()->constrained('quote_requests')->cascadeOnDelete();
            $table->string('reference')->index();
            $table->decimal('material_cost', 12, 2)->default(0);
            $table->decimal('printing_cost', 12, 2)->default(0);
            $table->decimal('tooling_cost', 12, 2)->default(0);
            $table->decimal('labor_cost', 12, 2)->default(0);
            $table->decimal('delivery_cost', 12, 2)->default(0);
            $table->decimal('overhead_cost', 12, 2)->default(0);
            $table->decimal('markup_percent', 5, 2)->default(0);
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('markup_amount', 12, 2)->default(0);
            $table->decimal('total_estimate', 12, 2)->default(0);
            $table->string('currency', 3)->default('PHP');
            $table->text('notes')->nullable();
            $table->foreignId('calculated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_pricings');
    }
};
