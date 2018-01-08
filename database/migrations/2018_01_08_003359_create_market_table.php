<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_t',
            function(Blueprint $table) {
                $table->increments('id');
                /** @noinspection PhpUndefinedMethodInspection */
                $table->string('market_name_text', 128)->nullable();
                /** @noinspection PhpUndefinedMethodInspection */
                $table->text('market_data_text')->nullable();
                $table->timestamps();

                $table->unique('market_name_text', 'ux_market_name');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_t');
    }
}
