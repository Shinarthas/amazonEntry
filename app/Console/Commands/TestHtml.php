<?php

namespace App\Console\Commands;

use App\Code;
use Illuminate\Console\Command;

class TestHtml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

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
        //Your code here
        $code=Code::find(1);
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,$code->redirect_url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $html = curl_exec($curl_handle);
        curl_close($curl_handle);
        echo  $html;
        $code->html=$html;
        $html->save();
    }
}
