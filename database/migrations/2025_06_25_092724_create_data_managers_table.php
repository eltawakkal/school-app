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
        Schema::create('data_managers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', [1, 2])->default(1); // 1 for man, 2 for woman
            $table->string('data_item_position_id')->nullable(); // Assuming this is a foreign key to another table
            $table->string('phone')->nullable();
            $table->text('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_managers');
    }
};
