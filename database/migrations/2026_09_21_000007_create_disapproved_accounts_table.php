<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('disapproved_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_user_id')->nullable();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('account_type')->default('client');
            $table->string('department')->nullable();
            $table->string('role_level')->nullable();
            $table->text('reason')->nullable();
            $table->foreignId('disapproved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('disapproved_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('disapproved_accounts');
    }
};
