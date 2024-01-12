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
        Schema::create('admin_builders', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('builder_email')->unique();
            $table->enum('account_type', ['painter', 'builder']);
            $table->string('phone_number');
            $table->string('address');
            $table->string('abn');
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
        Schema::dropIfExists('admin_builders');
    }
};
