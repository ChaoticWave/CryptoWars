<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_txn_t',
            function(Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('wallet_id');
                //  The wallet coin ID
                $table->unsignedInteger('coin_id');
                //  Optional source market id
                $table->unsignedInteger('market_id')->nullable();
                //  Transaction date
                $table->dateTime('txn_date');
                //  Quantity transacted +/-
                $table->double('qty_nbr')->default(0);
                //  The fees, total and coin used (USD, BTC, etc.)
                $table->double('fees_nbr')->default(0);
                $table->double('cost_nbr')->default(0);
                $table->unsignedInteger('paid_with_coin_id')->nullable();
                //  Optional transaction description/memo/etc.
                $table->string('desc_text', 512)->nullable();
                $table->timestamps();

                /** Indexes */
                $table->foreign('wallet_id')->references('id')->on('wallet_t');
                $table->foreign('coin_id')->references('id')->on('coin_t');
                $table->foreign('market_id')->references('id')->on('market_t');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_txn_t');
    }
}
