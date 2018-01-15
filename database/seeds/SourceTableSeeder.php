<?php

use Illuminate\Database\Seeder;

class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('source_t')->insert([
            'source_id_text'   => 'crypto-compare',
            'source_name_text' => 'CryptoCompare',
            'host_list_text'   => json_encode(['https://min-api.cryptocompare.com', 'https://www.cryptocompare.com/api']),
            'uri_text'         => '/data',
        ]);
    }
}
