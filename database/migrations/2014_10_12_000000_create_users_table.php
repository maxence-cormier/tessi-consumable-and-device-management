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
            $table->bigInteger('status_id')->index();
            $table->bigInteger('sites_id')->index();
            $table->boolean('ldap');
            $table->boolean('admin');
            $table->string('login')->unique();
            $table->string('password');                             // default
            $table->string('name_familly')->index();
            $table->string('name_first')->index();
            $table->bigInteger('user_status');                   // --> status_id
            $table->bigInteger('pwd_status');                    // --> status_id
            $table->string('user_expiration');
            $table->string('pwd_expiration');
            $table->integer('pwd_bad_cpt');
            $table->string('email');                                // default //->unique();
            $table->timestamp('email_verified_at')->nullable();     // default
//          $table->string('name');                                 // default
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
