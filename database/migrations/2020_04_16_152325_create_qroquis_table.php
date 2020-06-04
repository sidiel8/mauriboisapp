<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQroquisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('croquis', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('filext');
            /*$table->string('mime');
            $table->string('path');
            $table->integer('size');*/
            $table->string('designation') ;
            $table->integer('mesure_id') ;
            $table->integer('client_id') ;
            $table->string('designer') ;
            $table->timestamps();
            $table->string('respo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qroquis');
    }
}
