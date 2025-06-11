<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('kelurahan', function (Blueprint $table) {
    $table->id('idkelurahan');
    $table->string('namakelurahan');
    $table->string('kecamatan');
    $table->string('kabupaten');
    $table->string('provinsi');
    $table->text('alamatkelurahan')->nullable();
    $table->string('nohpkelurahan')->nullable();
    $table->string('fotokelurahan')->nullable();
    $table->decimal('latitude', 10, 7)->nullable();
    $table->decimal('longitude', 10, 7)->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan');
    }
};
