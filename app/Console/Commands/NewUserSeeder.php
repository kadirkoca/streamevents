<?php

namespace App\Console\Commands;

use App\Models\Donation;
use App\Models\Follower;
use App\Models\MerchSale;
use App\Models\Subscriber;
use Illuminate\Console\Command;

class NewUserSeeder extends Command
{
    protected $signature = 'seed:custom {--user=}';

    protected $description = 'Seed the database with custom data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $user = (int)$this->option('user');

        $this->info("Seeding {$user}'s tables...");
        $count = 300;

        Follower::factory()->count($count)->withUser($user)->create();
        Donation::factory()->count($count)->withUser($user)->create();
        MerchSale::factory()->count($count)->withUser($user)->create();
        Subscriber::factory()->count($count)->withUser($user)->create();

        $this->info('Custom seeding complete.');
    }
}
