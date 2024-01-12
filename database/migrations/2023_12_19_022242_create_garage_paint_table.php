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
        Schema::create('garage_paint', function (Blueprint $table) {
            $table->id();
            $table->string('brand_id')->nullable();
            $table->string('area_outside')->nullable();
            $table->string('area_inside')->nullable();
            $table->string('color')->nullable();
            $table->string('product')->nullable();
            $table->string('size')->nullable();
            $table->string('quantity')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('job_id')->nullable();
            $table->string('shop_type')->nullable();
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
        Schema::dropIfExists('garage_paint');
    }
};
