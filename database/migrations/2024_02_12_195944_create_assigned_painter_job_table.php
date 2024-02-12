<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedPainterJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigned_painter_job', function (Blueprint $table) {
            $table->id();
            $table->string('assigned_painter_name')->nullable();
            $table->unsignedBigInteger('assign_company_id')->nullable();
            $table->string('assigned_supervisor')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->text('assign_job_description')->nullable();
            $table->decimal('assign_price_job', 10, 2)->nullable();
            $table->integer('Q_1')->nullable();
            $table->integer('Q_2')->nullable();
            $table->integer('Q_3')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('job_id')->references('id')->on('painter_jobs');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigned_painter_job');
    }
}
