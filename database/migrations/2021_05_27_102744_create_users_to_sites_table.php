<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersToSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_to_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('users_id')->index();
            $table->bigInteger('sites_id')->index();
            $table->unique(['users_id', 'sites_id']);               // Clé composée n°1
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
        Schema::dropIfExists('users_to_sites');
    }
}
