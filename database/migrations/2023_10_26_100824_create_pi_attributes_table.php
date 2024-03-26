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
        Schema::create('pi_attributes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid')->unique();
            $table->bigInteger('pi_uid');
            $table->bigInteger('weight_uid');
            $table->text('title_en')->nullable();
            $table->text('title_bn')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pi_attributes');
    }
};
