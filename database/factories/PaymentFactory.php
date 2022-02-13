<?php

namespace Database\Factories;

use App\Models\Payment;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(
            [
                'credit_card',
                'cash_on_delivery',
                'bank_transfer',
            ]
        );

        $details = match ($type) {
            'credit_card' => json_encode(
                [
                    'holder_name' => $this->faker->name(),
                    'number' => $this->faker->creditCardNumber(),
                    'ccv' => $this->faker->creditCardDetails(),
                    'expiration_date' => $this->faker->creditCardExpirationDate(),
                ]
            ),
            'cash_on_delivery' => json_encode(
                [
                    'first_name' => $this->faker->firstName(),
                    'last_name' => $this->faker->lastName(),
                    'address' => $this->faker->address(),
                ]
            ),
            'bank_transfer' => json_encode(
                [
                    'swift' => $this->faker->swiftBicNumber(),
                    'iban' => $this->faker->iban(),
                    'name' => $this->faker->name(),
                ]
            ),
        };

        return [
            'uuid' => $this->faker->uuid(),
            'type' => $type,
            'details' => $details,
        ];
    }
}
