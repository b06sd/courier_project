<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('display_name');
            $table->string('company_name');
            $table->longText('description');
            $table->longText('address_street_1');
            $table->longText('address_street_2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('country');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('email');
            $table->enum('status', ['activated', 'not_activated'])->default('not_activated');
            $table->string('website')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedln_profile')->nullable();
            $table->text('background_info')->nullable();
            $table->string('sales_rep')->nullable();
            $table->string('rating');
            $table->string('project_type')->nullable();
            $table->longText('project_description')->nullable();
            $table->timestamp('proposal_due_date')->nullable();
            $table->string('budget');
            $table->longText('deliverable')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
