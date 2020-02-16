<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent')->nullable();
            $table->unsignedBigInteger('menu');
            $table->string('name');
            $table->string('link');
            $table->integer('sort_order');
            $table->timestamps();
        });

        Schema::table('menu_items', function (Blueprint $table){
            $table->foreign('menu')->references('id')->on('menus');
            $table->foreign('parent')->references('id')->on('menu_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
