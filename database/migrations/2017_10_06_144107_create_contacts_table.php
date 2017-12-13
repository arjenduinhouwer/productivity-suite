<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();

            $table->string('company_name')->default('');
            $table->string('firstname')->default('');
            $table->string('middlename')->default('');
            $table->string('lastname')->default('');

            $table->string('street');
            $table->string('zipcode');
            $table->string('city');
            
            $table->string('email');


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
