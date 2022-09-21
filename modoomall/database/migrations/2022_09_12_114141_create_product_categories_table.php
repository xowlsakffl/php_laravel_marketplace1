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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('pcdx');
            $table->string('group_id')->default("");
            $table->string('category_name')->default("");
            $table->string('category_detail_name')->default("");
            $table->unsignedBigInteger('category_id')->default(0);//카테고리 계층
            $table->unsignedBigInteger('category_parent_id')->default(0);//카테고리 특정 부모
            $table->unsignedTinyInteger('state')->default(10);
            $table->string('slug')->default("");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_categories');
    }
};
