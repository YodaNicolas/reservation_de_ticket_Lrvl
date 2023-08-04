<?php

use App\Models\utilisateur;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('utilisateur_id');
            // $table->foreign('utilisateur_id')->references('id')->on('users');
            $table->foreignId('user_id')->constrained();
            $table->string('etat_reservation')->default('Non validé');
            $table->integer('nombre_place')->default(1);

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
        Schema::dropIfExists('reservations');
    }
}
