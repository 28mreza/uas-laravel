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
        Schema::create('balitas', function (Blueprint $table) {
            $table->bigIncrements('idbalita');
            $table->foreignId('idposyandu');
            $table->string('namaibu');
            $table->string('nikibu');
            $table->string('alamatibu');
            $table->string('namaayah');
            $table->string('nikayah');
            $table->string('alamatayah');
            $table->string('namabalita');
            $table->date('tanggallahir');
            $table->enum('jeniskelamin', ['laki-laki','perempuan']);
            $table->enum('statusasi', ['asi','susu formula']);
            $table->double('beratlahir');
            $table->double('tinggilahir');
            $table->enum('statussosial', ['kelas atas','kelas menengah','kelas bawah']);
            $table->string('alamatbalita');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balitas');
    }
};
