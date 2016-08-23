<?php

namespace App\Console\Commands;

use App\Surestaries;
use Illuminate\Console\Command;

class CalculSurestaries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calcul:surestaries';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcul Surestaries';

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
     * @return mixed
     */
    public function handle()
    {
        Surestaries::create([
            'port_id' => 2,
            'type_container_code' => 'BLK',
            'position_id' =>1
        ]);
    }
}
