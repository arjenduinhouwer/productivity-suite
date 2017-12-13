<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('description');
            $table->integer('tally')->default(1);
            $table->integer('amount')->default(0);

            $table->integer('user_id')->unsigned()->nullable();

            $table->integer('invoice_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_posts');
    }
}
