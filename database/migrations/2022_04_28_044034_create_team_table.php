<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->id();
            $table->string('namaTeam',25);
            $table->float('nilaiFungsionalitas',10,2)->nullable();
            $table->float('nilaiKegunaan',10,2)->nullable();
            $table->float('nilaiKeandalan',10,2)->nullable();
            $table->float('nilaiEfisiensi',10,2)->nullable();
            $table->float('nilaiAkhir',10,2)->nullable();
            $table->integer('kehadiran')->nullable();
            $table->enum('sikap',['a','b','c'])->nullable();
            $table->enum('status',['lulus','tidak lulus'])->nullable();
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
        Schema::dropIfExists('team');
    }
}
