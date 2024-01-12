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
        if (!Schema::hasColumn('painter_jobs', 'house_size')) {
            Schema::table('painter_jobs', function (Blueprint $table) {
                $table->text('house_size')->nullable()->after('area');
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
            $table->dropColumn('house_size');
        });
    }
};
