<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgnizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgnizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('webaddress');
            $table->integer('phoneno');
            $table->string('email_first')->unique();
            $table->string('status');
            $table->string('address');
            $table->string('logo1');
            $table->string('logo2');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email_second')->unique();
            $table->string('mobileno');
            $table->integer('user_id');
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
        Schema::dropIfExists('orgnizations');
    }
}
