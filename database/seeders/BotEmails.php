<?php

namespace Database\Seeders;

use App\Models\BotEmail;
use Illuminate\Database\Seeder;

class BotEmails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <10 ; $i++) { 
            BotEmail::create([
                'email' => 'test'.$i.'gmail.com',
                'last_sent' => '0000-00-00 00:00:00',
                'satue' => 1,
            ]);   
        }
    }
}
