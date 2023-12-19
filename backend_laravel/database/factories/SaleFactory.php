<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sale;
use App\Models\Customer;

class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random customer ID from the existing customers
        $customerIds = Customer::pluck('id')->toArray();

        return [
            'date' => $this->faker->date(),
            'is_credit' => $this->faker->boolean(),
            'customer_id' => $this->faker->randomElement($customerIds),
        ];
    }
}
