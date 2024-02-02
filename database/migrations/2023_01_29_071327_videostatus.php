<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\limitation;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('limits', function (Blueprint $table) {
            $table->id();
            $table->string('title_limit');
            $table->timestamps();
        });

        Artisan::call('db:seed', ['--class'=>limitation::class]);
    }


    public function down(): void
    {
        Schema::dropIfExists('limits');
    }
};
