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
        Schema::table('videos', function (Blueprint $table) {
            // We add the column and make it nullable
            // We also place it after video_link for a clean database structure
            $table->string('video_path')->nullable()->after('video_link');

            // Since we are allowing uploads, we should also make the
            // original link nullable, in case they only want to upload a file
            $table->string('video_link')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('video_path');

            // Revert video_link to its original state if necessary
            $table->string('video_link')->nullable(false)->change();
        });
    }
};
