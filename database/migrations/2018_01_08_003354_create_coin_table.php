<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('coin_t',
            function(Blueprint $table) {
                $table->increments('id');
                /** @noinspection PhpUndefinedMethodInspection */
                $table->integer('market_id')->nullable();
                /** @noinspection PhpUndefinedMethodInspection */
                $table->string('source_text', 128)->nullable();
                $table->string('coin_key_text', 32);
                /** @noinspection PhpUndefinedMethodInspection */
                $table->text('coin_data_text')->nullable();
                $table->timestamps();

                $table->unique(['market_id', 'coin_key_text'], 'ux_coin_market');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('coin_t');
    }
}
