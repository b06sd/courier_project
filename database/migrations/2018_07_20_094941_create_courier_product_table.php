<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourierProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courier_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('courier_id');
            $table->integer('product_id');
            $table->decimal('amount', 10, 2);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courier_product', function (Blueprint $table) {
            //
        });
    }
}
