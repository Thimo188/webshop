<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cart_lines', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('cart_id')->unsigned();
        $table->integer('product_id')->unsigned();
        $table->double('amount', 15, 2);
        $table->timestamps();
      });

      Schema::table('cart_lines', function (Blueprint $table) {
        $table->foreign('cart_id')->references('id')->on('carts')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        $table->foreign('product_id')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('RESTRICT');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_lines');
    }
}
