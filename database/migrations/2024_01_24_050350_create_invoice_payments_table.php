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
        if (!Schema::hasTable('invoice_payments')) {
            Schema::create('invoice_payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
                $table->decimal('amount_main', 8, 2)->nullable();
                $table->decimal('parent_amount', 8, 2)->nullable();
                $table->decimal('remaning_amount', 8, 2)->nullable();
                $table->text('notes')->nullable();
                $table->timestamp('date')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('invoice_payments');
    }
};
