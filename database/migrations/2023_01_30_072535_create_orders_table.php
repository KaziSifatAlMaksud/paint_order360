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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('shop_id')->unsigned()->nullable();
            $table->float('price', 8, 2);
            $table->text('address')->nullable();
            $table->tinyInteger('status')->nullable()->default('1');
            $table->text('type')->nullable();
            $table->string('customer_name')->nullable();
            $table->bigInteger('builder')->unsigned()->nullable();
            $table->string('accountname')->nullable();

            $table->string('pickup')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('shop_id')->references('id')->on('shop')->onDelete('set null');
            $table->foreign('builder')->references('id')->on('builders')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
