<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class installDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs and migrates the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("resetting database tables...");
        Artisan::call('migrate:reset');

        $this->info("creating database tables...");
        Artisan::call('migrate');

        $this->info("Seeding database with dummy data...");
        Artisan::call('db:seed');

        return Command::SUCCESS;
    }
}
