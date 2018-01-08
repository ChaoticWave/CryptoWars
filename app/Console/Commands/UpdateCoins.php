<?php namespace ChaoticWave\Services\CryptoWars\Console\Commands;

use ChaoticWave\BlueVelvet\Console\Commands\BaseCommand;
use ChaoticWave\BlueVelvet\Traits\ConsoleHelper;
use ChaoticWave\Services\CryptoWars\Models\Coin;
use ChaoticWave\Services\CryptoWars\Providers\CryptoDataServiceProvider;
use ChaoticWave\Services\CryptoWars\Services\CryptoDataService;

class UpdateCoins extends BaseCommand
{
    use ConsoleHelper;

    //******************************************************************************
    //* Members
    //******************************************************************************

    /** @inheritdoc */
    protected $signature = 'cw:update-coins';
    /** @inheritdoc */
    protected $description = 'Updates coin database';

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Handle the work
     */
    public function handle()
    {
        $this->writeHeader();

        /** @var \ChaoticWave\Services\CryptoWars\Services\CryptoDataService $_service */
        $_service = app(CryptoDataServiceProvider::ALIAS);

        /** @var array $_coins */
        if (false === ($_coins = $_service->getAllCoins())) {
            throw new \RuntimeException('Failed to retrieve coin list');
        }

        $_source = $_service->getSource();

        foreach ($_coins as $_coin) {
            $_model = Coin::firstOrCreate(['coin_key_text' => $_coin['Name'], 'source_text' => $_source]);
            $_model->update(['coin_data_text' => $_coin]);
        }
    }
}
