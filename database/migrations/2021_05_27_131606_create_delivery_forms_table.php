<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('sites_id')->index();
            $table->string('delivery_form_number')->unique();
            $table->date('delivery_form_date')->index();
            $table->double('amount_ht');
            $table->double('amount_ttc');
            $table->double('discount');
            $table->bigInteger('providers_id')->index();
            $table->string('link');                                     // Chemin du Fichier du Devis
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
        Schema::dropIfExists('delivery_forms');
    }
}
