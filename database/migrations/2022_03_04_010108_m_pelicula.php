<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MPelicula extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pelicula', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('poster');
            $table->Integer('duration')->nullable();
            $table->string('clasificacion');
            $table->Text('sinopsis');
            $table->rememberToken();
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
