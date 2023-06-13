<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_groupe');
            $table->foreign('id_groupe')->references('id')->on('groupes')->onDelete('cascade');
            $table->unsignedBigInteger('id_formateur');
            $table->foreign('id_formateur')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')->references('id')->on('classes')->onDelete('cascade');
            $table->unsignedBigInteger('id_matiere');
            $table->foreign('id_matiere')->references('id')->on('matieres')->onDelete('cascade');
            $table->unsignedBigInteger('id_time');
            $table->foreign('id_time')->references('id')->on('times')->onDelete('cascade');
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
        Schema::dropIfExists('seances');
    }
}
