<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * create the data source table
         */
        \Schema::create('source_t',
            function(Blueprint $table) {
                $table->increments('id');
                /** @noinspection PhpUndefinedMethodInspection */
                $table->string('source_id_text', 128)->unique();
                $table->string('source_name_text', 128);
                $table->text('host_list_text');
                $table->string('uri_text', 1024);
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
        Schema::dropIfExists('source_t');
    }
}
