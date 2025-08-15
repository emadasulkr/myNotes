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
        Schema::create('author_book', function (Blueprint $table) {
             $table->char('book_ISBN', 13);
              $table->foreign('book_ISBN')->references('ISBN')->on('books')->onDelete('cascade')->onUpdate('cascade');
              $table->foreignId('author_id')->constrained()->onDelete('cascade');
              $table->primary(['book_ISBN' , 'author_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_book');
    }
};
