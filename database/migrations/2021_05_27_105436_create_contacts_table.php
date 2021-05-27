<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('sites_id')->index();
            $table->bigInteger('providers_id')->index();
            $table->bigInteger('type')->index();                        // --> status_id    (SAVTicketing/Tech./Counters/Conso.)
            $table->string('libelle')->unique();
            $table->string('name_familly')->unique();
            $table->string('name_first')->unique();
            $table->string('function');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2');
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
        Schema::dropIfExists('contacts');
    }
}
