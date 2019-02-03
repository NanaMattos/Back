<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('crm');
            $table->string('email');
            $table->string('especializacao');
            $table->string('dataDeNascimento');
            $table->integer('idPatients')->unsigned()->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('doctors',function (Blueprint $table){
          $table->foreign('idPatients')->references('id')->on('patients')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
