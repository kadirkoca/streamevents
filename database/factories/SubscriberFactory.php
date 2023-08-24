<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscriber>
 */
class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created = Carbon::now()->subDays(rand(0,90));
        $tier = rand(1,3);
        return [
            'user_id' => 1,
            'tier_id' => $tier,
            'name' => fake()->name,
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
