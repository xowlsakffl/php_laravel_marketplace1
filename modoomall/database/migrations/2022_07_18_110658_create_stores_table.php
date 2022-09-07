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
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('sdx');
            $table->unsignedBigInteger('udx');
            $table->string('store_email')->unique()->default("");
            $table->string('store_name')->default("");
            $table->string('store_tel')->default("");
            $table->unsignedTinyInteger('state')->default(10);
            $table->string('slug')->default("");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('udx')->references('udx')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
