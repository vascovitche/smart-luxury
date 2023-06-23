<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Admin\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone_number' => fake()->e164PhoneNumber,
        ];
    }

    public function status($status)
    {
        return $this->state(function (array $attributes) use ($status) {
            return [
                'status' => $status,
            ];
        });
    }

}
