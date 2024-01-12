<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('po_items', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('po_items', function (Blueprint $table) {
            $table->dropColumn('invoice_id');
        });
    }
};
