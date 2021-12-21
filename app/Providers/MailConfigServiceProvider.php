<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\BotSet;
use Illuminate\Support\Facades\Config;
class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
     
        $configuration = BotSet::latest()->first();

        // dd($configuration);

        if ($configuration) {
            $config = array(
                'driver'     =>     $configuration->driver,
                'host'       =>     $configuration->host,
                'port'       =>     $configuration->port,
                'username'   =>     $configuration->username,
                'password'   =>     $configuration->password,
                'encryption' =>     $configuration->encryption,
                'from'       =>     array('address' => $configuration->username, 'name' => $configuration->name),
            );
            Config::set('mail', $config);
         }

    }
}