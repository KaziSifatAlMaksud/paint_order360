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
        Schema::create('shop_order_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('print_order_id');
            $table->string('size')->nullable();
            $table->integer('amount')->nullable();
            $table->string('product')->nullable();
            $table->string('color')->nullable();
            $table->string('sheen')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->text('notes')->nullable();
            $table->double('area')->nullable();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('shop_order_item');
    }
};
