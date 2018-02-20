<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_t',
            function(Blueprint $table) {
                //  Columns
                $table->increments('id');
                $table->unsignedInteger('user_id');
                /** @noinspection PhpUndefinedMethodInspection */
                $table->string('wallet_id_text', 128)->unique();
                /** @noinspection PhpUndefinedMethodInspection */
                $table->string('wallet_desc_text', 512)->nullable();
                /** @noinspection PhpUndefinedMethodInspection */
                $table->text('properties_text')->nullable();
                $table->timestamps();

                /** @noinspection PhpUndefinedMethodInspection
                 *
                 * Indexes
                 *
                 */
                $table->foreign('user_id')->references('id')->on('user_t');
                $table->unique(['user_id', 'wallet_id_text'], 'ux_user_wallet_id');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_t');
    }
}
