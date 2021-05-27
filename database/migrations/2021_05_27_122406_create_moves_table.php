<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('users_id')->index();
            $table->timestamp('datetime')->nullable()->index();
            $table->bigInteger('type')->index();                             // --> status_id (Entrée/Sortie)
            $table->bigInteger('articles_id')->index();
            $table->bigInteger('printers_id')->index();
            $table->integer('printer_counter_1');
            $table->integer('printer_counter_2');
            $table->integer('printer_counter_3');
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
        Schema::dropIfExists('moves');
    }
}
