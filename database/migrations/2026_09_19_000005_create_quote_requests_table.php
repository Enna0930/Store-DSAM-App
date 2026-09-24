<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quote_requests', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_phone');
            $table->string('client_address')->nullable();
            $table->string('product_category');
            $table->string('material_type')->nullable();
            $table->string('target_quantity')->nullable();
            $table->string('dimensions_size')->nullable();
            $table->string('thickness_gauge')->nullable();
            $table->string('print_type')->nullable();
            $table->text('other_notes')->nullable();
            $table->string('sample_file_path')->nullable();
            $table->string('status')->default('submitted');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quote_requests');
    }
};
