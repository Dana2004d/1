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
        Schema::create('aid_requests', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('phone');
            $table->string('company_name')->nullable();
              $table->enum('aid_type',['food','medical','financial','other']);
             $table->string('link')->nullable();
              $table->text('notes')->nullable();
              $table->foreignId('category_id')
      ->constrained()
      ->cascadeOnDelete();
      $table->enum('status', ['pending', 'approved'])->default('pending');
             $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aid_requests');
    }
};
