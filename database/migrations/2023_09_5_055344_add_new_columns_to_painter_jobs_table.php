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
        if (!Schema::hasColumn('painter_jobs', 'colors_secound')) {
            Schema::table('painter_jobs', function (Blueprint $table) {
                $table->string('colors_secound')->nullable()->after('address');
                $table->string('colors_spec')->nullable()->after('address');
                $table->string('plan_granny')->nullable()->after('address');
                $table->string('builder_company_name')->nullable()->after('address');
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
            $table->dropColumn(['colors_secound', 'colors_spec', 'plan_granny', 'builder_company_name']);
        });
    }
};
