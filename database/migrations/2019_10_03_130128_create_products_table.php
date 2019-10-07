<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('category_id')->unsigned();
            $table->integer('amount')->unsigned()->default(0)->comment('На складе');
            $table->integer('reserved')->unsigned()->default(0)->comment('Зарезервированно');
            $table->boolean('enabled')->default(false);
            $table->integer('price')->unsigned();
            $table->integer('weight')->unsigned()->comment('Вес/количество товара в граммах/шт.');
            $table->bigInteger('buy_count')->unsigned()->default(0)->comment('Купленно всего');
            $table->boolean('is_new')->default(true)->comment('Новинка?');
            $table->boolean('is_hit')->default(false)->comment('Хит?');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropIfExists();
        });
    }
}
