<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SampleLogger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sample-logger';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '練習用に作成したロガー(他のものを作成したら削除)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        logger()->info('Sample logger');
    }
}
