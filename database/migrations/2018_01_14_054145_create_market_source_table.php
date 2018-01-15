<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_source_t',
            function(Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('market_id');
                $table->unsignedInteger('source_id');
                $table->timestamps();

                //  Indices
                $table->unique(['market_id', 'source_id'], 'ux_market_source');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('market_source_t');
    }
}
