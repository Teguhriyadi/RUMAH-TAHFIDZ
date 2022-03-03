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
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->id();
            $table->string("nama", 100)->nullable();
            $table->enum("jenis_kelamin", ["L", "P"]);
            $table->string("image", 150)->nullable();
            $table->string("nama_ayah", 100)->nullable();
            $table->string("nama_ibu", 100)->nullable();
            $table->string("no_hp", 30);
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
        Schema::dropIfExists('tb_siswa');
    }
};
