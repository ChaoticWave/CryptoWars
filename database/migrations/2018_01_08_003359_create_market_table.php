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
                $table->string('market_id_text', 128)->unique();
                $table->string('market_name_text', 128);
                $table->string('market_url_text', 1024);
                $table->string('lookup_uri_text', 1024);
                $table->string('country_text', 64);
                /** @noinspection PhpUndefinedMethodInspection */
                $table->integer('uct_offset_nbr')->default(0);
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
        Schema::dropIfExists('market_t');
    }
}
