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
        Schema::create('subcustomers', function (Blueprint $table) {
            $table->id();
            $table->string('companyName');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('MobileOthers')->nullable();
            $table->string('abn');
            $table->string('billingAddress');
            $table->string('user_id');
            $table->string('state');
            $table->timestamps();
        });
        $successMessage = "The 'subcustomers' table has been successfully created.";

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
        Schema::dropIfExists('subcustomers');
    }
};
