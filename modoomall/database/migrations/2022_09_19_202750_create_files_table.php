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
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('fdx');
            $table->unsignedBigInteger('udx')->default(NULL)->nullable();
            $table->unsignedBigInteger('pdx')->default(NULL)->nullable();
            $table->text('up_name')->default("");
            $table->string('real_name')->default("");
            $table->unsignedInteger('size')->default(0);
            $table->string('extension', 10)->default("");
            $table->unsignedSmallInteger('download')->default(0);
            $table->unsignedSmallInteger('width')->default(0);
            $table->unsignedSmallInteger('height')->default(0);
            $table->unsignedTinyInteger('state')->default(9);
            $table->timestamps();

            $table->foreign('pdx')->references('pdx')->on('products')->onUpdate('cascade');
            $table->foreign('udx')->references('udx')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
};
