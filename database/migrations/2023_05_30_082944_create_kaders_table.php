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
        Schema::create('kaders', function (Blueprint $table) {
            $table->bigIncrements('idkader');
            $table->foreignId('idposyandu');
            $table->string('emailkader')->unique();
            $table->string('pendidikankader');
            $table->string('alamatkader');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaders');
    }
};
