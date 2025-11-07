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
        Schema::table('name_suggestions', function (Blueprint $table) {
            $table->foreignId('family_id')
                ->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('name_suggestions', function (Blueprint $table) {
            // Drop foreign key first (Laravel generates it automatically)
            $table->dropForeign(['family_id']);
            // Then drop the column itself
            $table->dropColumn('family_id');
        });
    }
};
