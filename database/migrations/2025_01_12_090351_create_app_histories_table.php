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
        Schema::create('app_histories', function (Blueprint $table) {
            $table->id();
            $table->enum('type_history', ['unknown', 'request', 'post'])->default('unknown')->nullable();
            $table->enum('request_type', ['unknown', 'search', 'kategori', 'post'])->default('unknown')->nullable();
            $table->string("param_post")->nullable();
            $table->string("id_post")->nullable();
            $table->string("param_kategori")->nullable();
            $table->string("id_kategori")->nullable();
            $table->bigInteger("user_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_histories');
    }
};
