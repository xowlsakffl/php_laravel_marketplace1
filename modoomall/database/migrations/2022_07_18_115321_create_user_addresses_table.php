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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->bigIncrements('uadx');
            $table->unsignedBigInteger('udx');
            $table->string('title')->default("");
            $table->string('zipcode')->default("");
            $table->string('address1')->default("");
            $table->string('address2')->default("");
            $table->string('name')->default("");
            $table->string('tel')->default("");
            $table->text('msg')->default("");
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
        Schema::dropIfExists('user_addresses');
    }
};
