<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $amount = rand(10,150);
        $created = Carbon::now()->subDays(rand(0,90));
        return [
            'name' => fake()->name,
            'amount' => $amount,
            'currency' => 'USD',
            'donation_message' => fake()->sentence,
            'created_at'=>$created,
            'updated_at'=>$created
        ];
    }

    public function withUser($user): Factory|FollowerFactory
    {
        return $this->state([
            'user_id' => $user,
        ]);
    }
}
