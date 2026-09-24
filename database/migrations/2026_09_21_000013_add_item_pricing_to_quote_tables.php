<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_pricings', function (Blueprint $table) {
            $table->foreignId('quote_request_item_id')->nullable()->after('quote_request_id')->constrained('quote_request_items')->cascadeOnDelete();
            $table->index('quote_request_id');
            $table->dropUnique(['quote_request_id']);
            $table->unique('quote_request_item_id');
        });

        Schema::table('quote_pricing_tiers', function (Blueprint $table) {
            $table->foreignId('quote_request_item_id')->nullable()->after('quote_request_id')->constrained('quote_request_items')->cascadeOnDelete();
            $table->index('quote_request_id');
            $table->dropUnique(['quote_request_id', 'tier_number']);
            $table->unique(['quote_request_item_id', 'tier_number']);
        });
    }

    public function down(): void
    {
        Schema::table('quote_pricing_tiers', function (Blueprint $table) {
            $table->dropUnique(['quote_request_item_id', 'tier_number']);
            $table->dropForeign(['quote_request_item_id']);
            $table->dropColumn('quote_request_item_id');
            $table->unique(['quote_request_id', 'tier_number']);
        });

        Schema::table('quote_pricings', function (Blueprint $table) {
            $table->dropUnique(['quote_request_item_id']);
            $table->dropForeign(['quote_request_item_id']);
            $table->dropColumn('quote_request_item_id');
            $table->unique('quote_request_id');
        });
    }
};
