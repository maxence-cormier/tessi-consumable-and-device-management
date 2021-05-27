<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('sites_id')->index();
            $table->bigInteger('articles_ref_id')->index();
            $table->string('serial_number');
            $table->timestamp('datetime_entreprise_in')->nullable();
            $table->timestamp('datetime_entreprise_out')->nullable();
            $table->bigInteger('printer_current')->index();                  // --> printers_id
            $table->integer('counter_consumable');
            $table->bigInteger('orders_id')->index();
            $table->bigInteger('quotes_id')->index();
            $table->bigInteger('delivery_forms_id')->index();
            $table->bigInteger('invoices_id')->index();
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
        Schema::dropIfExists('articles');
    }
}
