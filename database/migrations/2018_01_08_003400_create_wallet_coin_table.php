<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletCoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('wallet_coin_t',
            function(Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('wallet_id');
                $table->unsignedInteger('coin_id');
                $table->double('balance_nbr');
                $table->timestamps();

                //  Optional source market id
                $table->foreign('wallet_id')->references('id')->on('wallet_t');
                $table->foreign('coin_id')->references('id')->on('coin_t');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('wallet_coin_t');
    }
}
