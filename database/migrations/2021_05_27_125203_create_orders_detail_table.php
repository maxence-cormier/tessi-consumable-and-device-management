<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->index();
            $table->bigInteger('order_id')->index();
            $table->bigInteger('articles_id')->index();
            $table->integer('quantity');
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
        Schema::dropIfExists('orders_detail');
    }
}
