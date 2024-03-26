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
        Schema::create('poriccheds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid')->unique();
            $table->tinyInteger('poricched_no')->nullable();
            $table->text('poricched_title')->nullable();
            $table->bigInteger('class_id')->nullable();
            $table->bigInteger('subject_uid')->nullable();
            $table->bigInteger('chapter_uid')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poriccheds');
    }
};
