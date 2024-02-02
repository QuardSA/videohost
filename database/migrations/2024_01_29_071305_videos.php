<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        {
            Schema::create('videos', function (Blueprint $table) {
                $table->id();
                $table->string('title_video');
                $table->string('video');
                $table->longText('description');
                $table->foreignId('users')->references('id')->on('users');
                $table->foreignId('categories')->references('id')->on('categories');
                $table->foreignId('limites')->references('id')->on('videostatuses');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
       Schema::dropIfExists('videos'); 
    }
};
