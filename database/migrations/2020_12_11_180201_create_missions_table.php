<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->id();
            $table->integer('numero')->nullable();
            $table->string('nom_client');
            $table->string('lieu');
            $table->string('date_debut');
            $table->string('date_fin');
            $table->string('heure_debut');
            $table->string('heure_fin');
            $table->string('responsable');
            $table->text('description');
            $table->text('observation')->nullable();
            $table->text('solution')->nullable();
            $table->text('recommandation')->nullable();
            $table->text('arrete')->nullable();
            $table->string('statut');
            $table->string('date_report')->nullable();
            $table->string('libelle_depense');
            $table->string('prix_depense');
            $table->string('qte_depense')->nullable();
            $table->string('montant_depense')->nullable();
            $table->string('total_depense')->nullable();
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
        Schema::dropIfExists('missions');
    }
}
