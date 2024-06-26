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
        Schema::table('admin_builders', function (Blueprint $table) {
            $table->string('schedule')->nullable();
            $table->string('img_log')->nullable();
            $table->string('builder_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_builders', function (Blueprint $table) {
            $table->dropColumn('schedule');
            $table->dropColumn('img_log');
            $table->dropColumn('builder_name');
        });
    }
};
