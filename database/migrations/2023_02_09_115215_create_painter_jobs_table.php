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
        if (!Schema::hasTable('painter_jobs')) {
            Schema::create('painter_jobs', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->text('address')->nullable();

                $table->text('plan')->nullable();
                $table->text('colors')->nullable();
                $table->text('po')->nullable();
                $table->text('area')->nullable();
                $table->float('price', 8, 2)->nullable();

                $table->date('start_date')->nullable();
                $table->date('received_date')->nullable();
                $table->tinyInteger('stairs_stained')->nullable()->default('0');
                $table->tinyInteger('cladding')->nullable()->default('0');
                $table->tinyInteger('render')->nullable()->default('0');
                $table->tinyInteger('status')->nullable()->default('0');
                $table->double('latitude')->nullable();
                $table->double('longitude')->nullable();

                $table->bigInteger('user_id')->unsigned()->nullable();
                $table->bigInteger('shop_id')->unsigned()->nullable();
                $table->bigInteger('builder_id')->unsigned()->nullable();


                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                $table->foreign('shop_id')->references('id')->on('shop')->onDelete('set null');
                $table->foreign('builder_id')->references('id')->on('admin_builders')->onDelete('set null');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('painter_jobs');
    }
};
