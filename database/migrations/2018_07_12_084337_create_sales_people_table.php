<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_id')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->string('employee_number')->nullable();
            $table->text('note');
            $table->decimal('total_sales');
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
        Schema::dropIfExists('sales_people');
    }
}
