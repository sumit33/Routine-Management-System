<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;

class requestUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request Updated';

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
        $limit = Carbon::now()->addHour(6)->subMinute(2);
        DB::table('requests')
        ->where('created_at','<',$limit)
        ->delete();
        //echo $limit;
    }
}
