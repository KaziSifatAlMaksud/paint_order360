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
            Schema::table('painter_jobs', function (Blueprint $table) {
                $table->bigInteger('order_id')->unsigned()->nullable()->after('id');
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
        Schema::table('painter_jobs', function (Blueprint $table) {
            $table->dropColumn('order_id');
        });
    }
};
