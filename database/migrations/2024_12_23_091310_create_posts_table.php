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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('title');
            $table->string('slug_post')->unique();
            $table->text('image')->nullable();
            $table->text('content');
            $table->foreignId('kategori_id')
                ->constrained('kategoris', 'kategori_id')
                ->onDelete('cascade'); // = section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
