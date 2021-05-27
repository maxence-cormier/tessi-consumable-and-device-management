<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('printers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->boolean('printer_color');
            $table->bigInteger('printer_type')->index();                            // --> status_id    (Jet/laser)
            $table->double('cost_to_sheet_black_and_white');
            $table->double('cost_to_sheet_color');
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
        Schema::dropIfExists('printers');
    }
}
