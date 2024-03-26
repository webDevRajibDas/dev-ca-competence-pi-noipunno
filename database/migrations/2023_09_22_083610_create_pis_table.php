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
        Schema::create('pis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid')->unique();
            $table->string('pi_id');
            $table->string('pi_no')->nullable();
            $table->bigInteger('chapter_uid')->nullable();
            $table->text('name_en')->nullable();
            $table->text('name_bn')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('competence_uid');
            $table->integer('competence_id')->nullable();
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
        Schema::dropIfExists('pis');
    }
};
