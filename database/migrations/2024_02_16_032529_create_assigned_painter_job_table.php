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
        Schema::create('assigned_painter_job', function (Blueprint $table) {
            $table->id();
            // Removed the empty string column definition. Add or correct this line if that was a mistake.
            $table->unsignedBigInteger('assigned_painter_name')->nullable(); // Assuming this should be a foreign key to 'users' table, it needs to match the type expected for foreign keys.
            $table->unsignedBigInteger('assign_company_id')->nullable();
            $table->unsignedBigInteger('assigned_supervisor')->nullable();
            $table->unsignedBigInteger('job_id'); // Assuming 'job_id' should not be nullable if it's a required relationship
            $table->text('assign_job_description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->decimal('assign_price_job', 10, 2)->nullable();
            $table->decimal('paint_cost', 10, 2)->nullable();
            $table->integer('status')->nullable();
            $table->integer('Q_1')->nullable();
            $table->integer('Q_2')->nullable();
            $table->integer('Q_3')->nullable();
            $table->timestamps();

            // Now, define the foreign keys
            $table->foreign('assigned_painter_name')->references('id')->on('users');
            $table->foreign('assign_company_id')->references('id')->on('admin_builders');
            $table->foreign('assigned_supervisor')->references('id')->on('supervisers');
            $table->foreign('job_id')->references('id')->on('painter_jobs'); // Assuming you want to delete assigned jobs if the painter job is deleted
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
};
