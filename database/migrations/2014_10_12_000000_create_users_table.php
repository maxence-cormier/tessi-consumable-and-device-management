<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('delete_date')->nullable()->index();
            $table->bigInteger('status_id')->default(0)->index();
            $table->bigInteger('sites_id')->default(0)->index();
            $table->boolean('ldap')->default(false);
            $table->boolean('admin')->default(false);
            $table->string('login')->unique();
            $table->string('password');                             // default
            $table->string('name')->nullable()->index();
            $table->string('firstname')->nullable()->index();
            $table->bigInteger('user_status')->default(0);          // --> status_id
            $table->bigInteger('pwd_status')->default(0);           // --> status_id
            $table->string('user_expiration')->nullable();
            $table->string('pwd_expiration')->nullable();
            $table->integer('pwd_bad_cpt')->nullable();
            $table->string('email')->nullable();                    // default //->unique();
            $table->timestamp('email_verified_at')->nullable();     // default
            $table->rememberToken();                                // default - Jeton de protection contre le détournement de cookies.
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
        Schema::dropIfExists('users');
    }
}
