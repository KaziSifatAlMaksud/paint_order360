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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('companyName')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('MobileOthers')->nullable();
            $table->string('abn')->nullable();
            $table->string('billingAddress')->nullable();
            $table->string('user_id')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
        });

        $successMessage = "The 'customers' table has been successfully created.";

        // Store the success message in the session
        session()->flash('success', $successMessage);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
