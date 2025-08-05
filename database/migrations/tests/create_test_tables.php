<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Таблица users (соответствует ТЗ)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Таблица posts
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->text('body');
            $table->timestamps();
        });

        // Таблица comments
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('users');
    }
};