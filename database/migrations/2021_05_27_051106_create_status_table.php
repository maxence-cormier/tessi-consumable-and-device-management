<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->string('filter')->index();
            $table->integer('index')->index();
            $table->string('name_short')->index();
            $table->string('name_long')->index();
            $table->string('libelle');
            $table->string('comment');
            $table->unique(['filter', 'name_short']);               // Clé composée n°1
            $table->unique(['filter', 'name_long']);                // Clé composée n°2
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
        Schema::dropIfExists('status');
    }
}
