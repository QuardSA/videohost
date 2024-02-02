<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\role;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title_role');
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class'=>role::class]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
