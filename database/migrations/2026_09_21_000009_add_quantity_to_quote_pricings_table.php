<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('quote_pricings', function (Blueprint $table) {
            $table->unsignedInteger('quantity')->default(1)->after('reference');
        });

        DB::table('quote_pricings')->get()->each(function ($pricing) {
            $targetQuantity = DB::table('quote_requests')
                ->where('id', $pricing->quote_request_id)
                ->value('target_quantity');
            $quantity = (int) preg_replace('/[^0-9]/', '', (string) $targetQuantity);

            if ($quantity > 0) {
                DB::table('quote_pricings')
                    ->where('id', $pricing->id)
                    ->update(['quantity' => $quantity]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('quote_pricings', function (Blueprint $table) {
            $table->dropColumn('quantity');
        });
    }
};
