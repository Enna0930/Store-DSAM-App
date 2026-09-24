<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('company_name');
            $table->string('contact_person')->nullable();
            $table->string('phone')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('monthly_volume')->nullable();
            $table->json('preferred_packaging')->nullable();
            $table->timestamps();
        });

        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('employee_id')->unique();
            $table->string('job_title')->nullable();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('client_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('reference')->unique();
            $table->string('product_name');
            $table->unsignedInteger('quantity')->default(0);
            $table->string('status')->default('queued');
            $table->date('requested_delivery_at')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('production_telemetry', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_order_id')->nullable()->constrained('client_orders')->nullOnDelete();
            $table->string('line_name');
            $table->string('stage');
            $table->unsignedTinyInteger('progress')->default(0);
            $table->string('status')->default('queued');
            $table->decimal('variance_percent', 5, 2)->nullable();
            $table->timestamp('reported_at')->nullable();
            $table->timestamps();
        });

        Schema::create('tooling_assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('asset_type');
            $table->string('asset_code')->unique();
            $table->string('description')->nullable();
            $table->string('status')->default('available');
            $table->date('next_service_at')->nullable();
            $table->timestamps();
        });

        Schema::create('reorder_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_order_id')->nullable()->constrained('client_orders')->nullOnDelete();
            $table->string('product_name');
            $table->unsignedInteger('quantity')->default(0);
            $table->string('status')->default('submitted');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reorder_requests');
        Schema::dropIfExists('tooling_assets');
        Schema::dropIfExists('production_telemetry');
        Schema::dropIfExists('client_orders');
        Schema::dropIfExists('admin_profiles');
        Schema::dropIfExists('client_profiles');
    }
};
