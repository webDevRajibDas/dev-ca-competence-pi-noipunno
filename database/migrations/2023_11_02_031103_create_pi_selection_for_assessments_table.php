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
        Schema::create('pi_selection_for_assessments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid')->unique();
            $table->bigInteger('class_uid')->nullable();
            $table->bigInteger('subject_uid')->nullable();
            $table->integer('assessment_type');
            $table->integer('submit_status')->nullable();
            $table->integer('approval_status')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
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
        Schema::dropIfExists('pi_selection_for_assessments');
    }
};
