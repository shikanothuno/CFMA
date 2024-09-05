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
        Schema::table('items', function (Blueprint $table) {
            $table->foreignId("listing_user")->constrained("users")->after("image_id");
            $table->foreignId("purchase_user")->nullable()->constrained("users")->after("listing_user");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn("listing_user");
            $table->dropColumn("purchase_user");
        });
    }
};
