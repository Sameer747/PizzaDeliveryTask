<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class CustomRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:c-r';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'single command to execute optimize,config,cache,route clear command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('cache:clear', [], $this->getOutput());
        Artisan::call('config:clear', [], $this->getOutput());
        Artisan::call('route:clear', [], $this->getOutput());
        Artisan::call('optimize', [], $this->getOutput());
    }
}
