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
            $table->foreignId('manufacturer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('drivetrain_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('aspiration_type_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->string('picture_path');
            $table->year('production_year');
            $table->string('price_credits');
            $table->string('engine_name');
            $table->smallInteger('weight_kg');
            $table->smallInteger('power_bhp');
            $table->smallInteger('torque_kgfm');
            $table->smallInteger('displacement_cc');
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
