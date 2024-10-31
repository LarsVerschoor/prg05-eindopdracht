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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('manufacturer_id')->nullable()->constrained()->cascadeOnDelete();
//            $table->foreignId('group_id')->nullable()->constrained()->cascadeOnDelete();
//            $table->foreignId('drivetrain_type_id')->nullable()->constrained()->cascadeOnDelete();
//            $table->foreignId('aspiration_type_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name');
//            $table->string('description')->nullable();
//            $table->string('picture_path')->nullable();
//            $table->year('production_year')->nullable();
//            $table->string('price_credits')->nullable();
//            $table->string('engine_name')->nullable();
//            $table->smallInteger('weight_kg')->nullable();
//            $table->smallInteger('power_bhp')->nullable();
//            $table->smallInteger('torque_kgfm')->nullable();
//            $table->smallInteger('displacement_cc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
