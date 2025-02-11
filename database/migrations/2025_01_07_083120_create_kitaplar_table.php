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
            $table->string('book_name');
            $table->string('writer');
            $table->string('publishing_house')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('category')->nullable();
            $table->string('isbn_no')->unique();
            $table->integer('page_number')->nullable();
            $table->text('book_content')->nullable();
            $table->string('book_picture')->nullable();
            $table->string('book_file')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
