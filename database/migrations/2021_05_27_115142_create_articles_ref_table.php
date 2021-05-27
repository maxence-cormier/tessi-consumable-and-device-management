<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesRefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles_ref', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->string('manufacturer');
            $table->string('model');
            $table->string('type');
            $table->string('group_ref');
            $table->string('price_ref');
            $table->string('capacity_ref');
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
        Schema::dropIfExists('articles_ref');
    }
}
