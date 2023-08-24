<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DBSeedAfterRegistration extends Seeder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Artisan::call('seed:custom', ['--user' => $event->user->id]);
    }
}
