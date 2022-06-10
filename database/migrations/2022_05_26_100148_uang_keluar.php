<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UangKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_keluars', function (Blueprint $table) {
            $table->id();
            $table->Integer('id_keluar');
            $table->Text('deskripsi');
            $table->String('kategori');
            $table->String('uang');
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
        Schema::dropIfExists('uang_keluars');
    }
}
