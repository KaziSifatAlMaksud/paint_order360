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
        if (!Schema::hasColumn('painter_jobs', 'company_id')) {
            Schema::table('painter_jobs', function (Blueprint $table) {
                $table->integer('company_id')->nullable()->after('address');
                $table->integer('supervisor_id')->nullable()->after('company_id'); // Put 'supervisor_id' after 'company_id'
                # $table->integer('supervisor_id')->nullable()->after('address');
                //
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
            $table->dropColumn(['company_id', 'supervisor_id']); // Drop both columns
            #  $table->dropColumn(['company_id', 'company_id']);
        });
    }
};
