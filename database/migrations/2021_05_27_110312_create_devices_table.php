<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('sites_id')->index();
            $table->string('manufacturer');
            $table->string('model');
            $table->string('type');
            $table->string('serial_number');
            $table->string('immo_number');
            $table->string('immo_barcodes');
            $table->bigInteger('providers_id')->index();
            $table->bigInteger('invoices_id')->index();
            $table->Integer('warranty');                                                    // durée en mois
            $table->date('date_commissioning');
            $table->date('date_release');
            $table->string('comment');
            $table->unique(['manufacturer', 'model', 'type', 'serial_number']);               // Clé composée n°1
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
        Schema::dropIfExists('devices');
    }
}
