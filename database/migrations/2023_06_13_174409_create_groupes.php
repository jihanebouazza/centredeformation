<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('statut')->default('open');
            $table->integer('capacite');
            $table->integer('nombre_etudiant')->nullable();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->unsignedBigInteger('formation_id');
            $table->foreign('formation_id')->references('id')->on('formations')->onDelete('cascade');
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
        Schema::dropIfExists('groupes');
    }
}
