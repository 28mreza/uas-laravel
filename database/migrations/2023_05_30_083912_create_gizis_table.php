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
        Schema::create('gizis', function (Blueprint $table) {
            $table->bigIncrements('idgizi');
            $table->foreignId('idbalita');
            $table->date('tanggaltimbang');
            $table->double('tinggibadan');
            $table->double('beratbadan');
            $table->string('statusbb');
            $table->string('statustb');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gizis');
    }
};
