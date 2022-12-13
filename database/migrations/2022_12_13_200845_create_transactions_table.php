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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('third_party_id');
            $table->float('amount', 8, 2);
            $table->string('currency')->default('TZS');
            $table->string('status')->default('SUCCESSFUL'); //SUCCESSFUL-FAILED
            $table->text('remark')->nullable();
            $table->foreignId('order_id')->nullable()->constrained();
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
        Schema::dropIfExists('transactions');
    }
};
