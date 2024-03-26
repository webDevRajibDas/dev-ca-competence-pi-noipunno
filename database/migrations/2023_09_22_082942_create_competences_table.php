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
        Schema::create('competences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid')->unique();
            $table->integer('competence_id');
            $table->string('competence_no')->nullable();
            $table->text('name_en')->nullable();
            $table->text('name_bn')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_bn')->nullable();
            $table->string('session')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['Draft', 'Publish', 'Reject', 'Approve'])->default('Draft');
            $table->bigInteger('class_uid')->nullable();
            $table->bigInteger('subject_uid')->nullable();
            $table->bigInteger('chapter_uid')->nullable();
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
        Schema::dropIfExists('competences');
    }
};
