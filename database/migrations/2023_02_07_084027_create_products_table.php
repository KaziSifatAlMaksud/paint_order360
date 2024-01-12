<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->integer('order')->default(1);
            $table->text('details')->nullable();
            $table->text("img")->nullable();
            $table->string('price')->nullable();
            $table->string('sale_price')->nullable();
            $table->string('url')->nullable();
            $table->string('target')->nullable();
            $table->tinyInteger('status')->nullable()->default('1');
     
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
        Schema::dropIfExists('products');
    }
};
