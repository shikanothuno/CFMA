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
        Schema::table('users', function (Blueprint $table) {
            $table->string("user_zip_code",8)->after("is_admin")->nullable();
            $table->string("user_address")->after("user_zip_code")->nullable();
            $table->string("user_building_name")->after("user_address")->nullable();
            $table->foreignId("image_id")->after("user_building_name")->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("user_zip_code");
            $table->dropColumn("user_address");
            $table->dropColumn("user_building_name");
            $table->dropColumn("image_id");
        });
    }
};
