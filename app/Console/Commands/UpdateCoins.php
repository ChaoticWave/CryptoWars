<?php namespace ChaoticWave\CryptoWars\Console\Commands;

use ChaoticWave\BlueVelvet\Console\Commands\BaseCommand;
use ChaoticWave\BlueVelvet\Traits\ConsoleHelper;
use ChaoticWave\CryptoWars\Models\Coin;
use ChaoticWave\CryptoWars\Providers\CryptoDataServiceProvider;

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

        /** @var \ChaoticWave\CryptoWars\Services\CryptoDataService $_service */
        $_service = app(CryptoDataServiceProvider::ALIAS);

        $this->writeln('<info>*</info> Data service created: <comment>' . $_service->getSource()->getName() . '</comment>');

        /** @var array $_coins */
        if (false === ($_coins = $_service->getAllCoins())) {
            throw new \RuntimeException('Failed to retrieve coin list');
        }

        if (!empty($_coins)) {
            $this->writeln('<info>*</info> Found <comment>' . count($_coins) . '</comment> coin(s). Updating...' . PHP_EOL);

            $_count = $this->updateDatabase($_coins);

            $this->writeln('');
            $this->writeln(PHP_EOL . '<info>*</info> Complete. <comment>' . $_count . '/' . count($_coins) . '</comment> coin(s) updated');
        } else {
            $this->writeln('<error>*</error>  - No coins found or service down.');
        }

        $this->writeln('');

        return true;
    }

    protected function updateDatabase($coins)
    {
        $_count = $_updated = 0;
        $_progress = $this->output->createProgressBar(count($coins));
        $_progress->setRedrawFrequency(100);

        foreach ($coins as $_coin) {
            $_row = ['symbol_text' => $_coin['Symbol']];
            $_model = Coin::firstOrCreate($_row);

            if ($_model->update(['coin_data_text' => $_coin])) {
                $_updated++;
            }

            $_progress->advance();
            $_count++;
        }

        $_progress->finish();

        return $_updated;
    }
}
