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
        Schema::create('data_visitors', function (Blueprint $table) {
            $table->id();
            $table->integer('visitor_type');
            $table->integer('data_parent_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('data_manager_id')->nullable();
            $table->integer('data_student_id')->nullable();
            $table->string('destinaition_name')->nullable();
            $table->string('purpose')->nullable();
            $table->boolean('is_overnight')->default(false);
            $table->integer('data_item_building_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_visitors');
    }
};
