<?php

namespace Database\Factories;

use App\Models\OrderStatus;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_status_id' => OrderStatus::factory()->create()->id,
            'payment_id' => Payment::factory()->create()->id,
            'uuid' => $this->faker->uuid(),
            'products' => json_encode(
                [
                    [
                        'product' => $this->faker->uuid(),
                        'quantity' => $this->faker->randomNumber(),
                    ],
                ]
            ),
            'address' => json_encode(
                [
                    'billing' => $this->faker->word(),
                    'shipping' => $this->faker->word(),
                ]
            ),
            'delivery_fee' => $this->faker->randomNumber(4),
            'amount' => $this->faker->randomNumber(4),
        ];
    }
}
