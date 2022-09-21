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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->bigIncrements('updx');
            $table->unsignedBigInteger('udx');
            $table->string('payment_type')->default("");
            $table->string('provider')->default("");
            $table->unsignedBigInteger('account_no');
            $table->timestamp('expiry');
            $table->string('slug')->default("");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('udx')->references('udx')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_payments');
    }
};
