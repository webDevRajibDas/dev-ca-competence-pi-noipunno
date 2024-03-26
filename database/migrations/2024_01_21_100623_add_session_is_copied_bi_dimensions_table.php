<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bi_dimensions', function (Blueprint $table) {
            $table->string('session')->nullable()->after('dimension_details');
            $table->tinyInteger('is_copied')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bi_dimensions', function (Blueprint $table) {
            $table->dropColumn('session');
            $table->dropColumn('is_copied');
        });
    }
};
