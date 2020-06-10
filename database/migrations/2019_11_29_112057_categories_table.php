<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('img_name')->nullable();
            $table->string('type')->nullable();
            $table->string('size')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::create('categoriesables', function (Blueprint $table) {
            $table->bigIncrements('category_id');
            $table->integer('categoriesable_id');
            $table->string('categoriesable_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}

