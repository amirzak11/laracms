<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('name');

        });


        Schema::create('property_product', function (Blueprint $table) {
            $table->bigIncrements('property_id');
            $table->integer('product_id');
        });

        Schema::create('property_category', function (Blueprint $table) {
            $table->bigIncrements('property_id');
            $table->integer('category_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
        Schema::dropIfExists('property_product');
        Schema::dropIfExists('property_category');
    }
}
