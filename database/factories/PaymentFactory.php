<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => fake()->randomFloat($maxDecimals = 2, $min = 0, $max = 500),
            'payment_method' => fake()->randomElement(['credit', 'debit', 'paypal']),
            'payed_at' => fake()->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timeZone = 'Europe/Madrid')
        ];
    }
}
