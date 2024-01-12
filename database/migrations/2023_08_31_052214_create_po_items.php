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
        Schema::create('po_items', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('painter_jobs')->onDelete('cascade');
            $table->integer('batch')->nullable();
           
            $table->integer('ponumber')->nullable();

            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('po_items');
    }
};
