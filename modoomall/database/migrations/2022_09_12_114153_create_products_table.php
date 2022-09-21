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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('pdx');
            $table->unsignedBigInteger('pcdx');
            $table->unsignedBigInteger('sdx');
            $table->unsignedSmallInteger('sequence')->default(0);
            $table->string('title')->default("제목");
            $table->string('name')->default("제품명");
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('quantity')->default(0);
            $table->text('content')->default("");
            $table->unsignedBigInteger('price_normal')->default(0);
            $table->integer('delivery_origin_cost')->default(0);//단위당 기본 배송비
            $table->string('supply')->default('제조사');
            $table->unsignedTinyInteger('state')->default(10);
            $table->unsignedBigInteger('hit')->default(0);
            $table->string('slug')->default("");
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pcdx')->references('pcdx')->on('product_categories')->onUpdate('cascade');
            $table->foreign('sdx')->references('sdx')->on('stores')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
