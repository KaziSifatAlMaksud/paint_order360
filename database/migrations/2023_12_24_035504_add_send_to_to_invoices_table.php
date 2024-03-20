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
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('send_to')->nullable();
            $table->string('attachment1')->nullable(); // For image paths
            $table->string('attachment2')->nullable(); // For PDF paths or other file types
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('send_to');
            $table->dropColumn('attachment1');
            $table->dropColumn('attachment2');
        });
    }
};
