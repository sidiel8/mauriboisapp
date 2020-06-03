<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_devis');
            $table->integer('montant_devis') ;
            $table->integer('client_id') ;
            $table->integer('user_id') ;
            $table->integer('numero_facture')->nullable() ;
            $table->date('date_facturation')->nullable();
            $table->date('date_decharge')->nullable() ;
            $table->timestamps();
            $table->string('respo') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devis');
    }
}
