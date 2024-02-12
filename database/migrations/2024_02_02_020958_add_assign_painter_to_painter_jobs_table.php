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
        Schema::table('painter_jobs', function (Blueprint $table) {
            $table->json('assign_painter')->nullable()->after('company_id');
            $table->json('assign_companyName')->nullable()->after('assign_painter');
            $table->json('assign_supervisor')->nullable()->after('assign_companyName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('painter_jobs', function (Blueprint $table) {
            $table->dropColumn('assign_painter');
            $table->dropColumn('assign_companyName');
            $table->dropColumn('assign_supervisor');
        });
    }
};
