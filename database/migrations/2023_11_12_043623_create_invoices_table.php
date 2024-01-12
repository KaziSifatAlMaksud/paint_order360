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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('send_email')->nullable();
            $table->string('inv_number')->nullable();
            $table->date('date');
            $table->string('purchase_order')->nullable();
            $table->string('job_id')->nullable();
            $table->string('address');
            $table->text('description')->nullable();
            $table->string('attachment')->nullable();
            $table->text('job_details')->nullable();
            $table->decimal('amount', 8, 2);
            $table->decimal('gst', 8, 2);
            $table->decimal('total_due', 8, 2);
            $table->string('status')->default('1');
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
        Schema::dropIfExists('invoices');
    }
};
