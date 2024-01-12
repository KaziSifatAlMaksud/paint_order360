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
        Schema::create('p_job_items', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();
            $table->string('product')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('qty')->nullable();
            $table->text('main_area')->nullable();
            $table->tinyInteger('painter_edit')->nullable()->default('1');
            $table->text('note')->nullable();
            $table->enum('type', ['inside', 'outside'])->nullable()->default('inside');
            $table->bigInteger('job_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('job_id')->references('id')->on('painter_jobs')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_job_items');
    }
};
