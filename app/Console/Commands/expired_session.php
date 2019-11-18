<?php

namespace App\Console\Commands;

use App\Session_qa;
use Carbon\Carbon;
use Illuminate\Console\Command;

class expired_session extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //
        Session_qa::where('expired_at','<',carbon::now())->delete();
    }
}
