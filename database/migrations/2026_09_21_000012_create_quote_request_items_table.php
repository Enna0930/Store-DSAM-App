<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_request_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_request_id')->constrained('quote_requests')->cascadeOnDelete();
            $table->unsignedTinyInteger('item_number');
            $table->string('product_category');
            $table->string('material_type')->nullable();
            $table->string('target_quantity')->nullable();
            $table->string('dimensions_size')->nullable();
            $table->string('thickness_gauge')->nullable();
            $table->string('print_type')->nullable();
            $table->text('other_notes')->nullable();
            $table->timestamps();
            $table->unique(['quote_request_id', 'item_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_request_items');
    }
};
