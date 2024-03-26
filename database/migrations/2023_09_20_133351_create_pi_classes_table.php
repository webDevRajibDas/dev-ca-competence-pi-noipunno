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
        Schema::create('pi_classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid')->unique();
            $table->integer('class_id');
            $table->string('name_en')->nullable();
            $table->string('name_bn')->nullable();
            $table->string('class_code')->nullable();
            $table->enum('version', ['bangla', 'english']);
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
        Schema::dropIfExists('pi_classes');
    }
};
