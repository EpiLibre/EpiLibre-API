<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceHistoricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_historics', function (Blueprint $table) {
            $table->id();
            $table->double("oldPrice");
            $table->double("newPrice");
            $table->boolean("seen")->default(false);
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_historics');
    }
}