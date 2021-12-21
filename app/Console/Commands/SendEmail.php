<?php

namespace App\Console\Commands;

use App\Mail\EmailSend;
use App\Models\BotEmail;
use App\Notifications\EmailNotify;
use Database\Seeders\BotEmails;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Eamil send to users';

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
       
        $users = BotEmail::where('last_sent','=','0000-00-00')->orderBy('id','asc')->take(5)->get();
        
        foreach ($users as $user) {
            Mail::to($user['email'])->send(new EmailSend($user));
        }
        $this->info($users);
        
    }
}
