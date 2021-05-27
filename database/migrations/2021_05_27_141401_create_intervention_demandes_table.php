<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervention_demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('users_id')->index();
            $table->timestamp('intervention_demande_datetime')->nullable()->index();
            $table->bigInteger('type')->index();                             // --> status_id (Email/Phone)
            $table->string('comment');
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
        Schema::dropIfExists('intervention_demandes');
    }
}
