<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
           $table->id();
           $table->string('title', 150);
           $table->text('description')->nullable();
           $table->boolean('is_completed')->default(false);
           $table->timestamp('completed_at')->nullable();
           $table->timestamps();
           $table->index('is_completed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
