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
                $table->string('symbol_text', 32)->unique();
                /** @noinspection PhpUndefinedMethodInspection */
                $table->text('coin_data_text')->nullable();
                $table->timestamps();
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
