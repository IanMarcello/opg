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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('pay_number')->index();
            $table->string('third_party_id');
            $table->float('total_amount', 8, 2);
            $table->string('currency')->default('TZS');
            $table->string('status')->default('PENDING'); // PENDING-PAID-DISBURSED
            $table->text('remark')->nullable();
            $table->string('mno')->nullable();
            $table->string('buyer')->nullable();
            $table->string('type')->default('FIXED'); // FIXED-INSTALLLMENT
            $table->foreignId('app_id')->nullable()->constrained();
            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
};
