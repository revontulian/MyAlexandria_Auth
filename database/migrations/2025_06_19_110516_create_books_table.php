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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('author');
            $table->string('isbn')->unique();
            $table->date('published_date')->nullable();
            $table->string('genre')->nullable();
            $table->boolean('is_public')->default(true);
            $table->foreignId('owner_user_id')->constrained()->onDelete('cascade');
            $table->foreignId('current_user_id')->nullable()->constrained('users')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
