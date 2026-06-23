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
        Schema::table('home_services', function (Blueprint $table) {
            $table->string('image_upload')->nullable();
            $table->string('image_url')->nullable()->change();
        });

        Schema::table('featured_destinations', function (Blueprint $table) {
            $table->string('image_upload')->nullable();
            $table->string('image_url')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_services', function (Blueprint $table) {
            $table->dropColumn('image_upload');
            // Revert image_url to not nullable (could cause issues if data exists, but okay for down)
            $table->string('image_url')->nullable(false)->change();
        });

        Schema::table('featured_destinations', function (Blueprint $table) {
            $table->dropColumn('image_upload');
            $table->string('image_url')->nullable(false)->change();
        });
    }
};
