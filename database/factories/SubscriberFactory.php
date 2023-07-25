<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Admin\Models\Subscriber;

class SubscriberFactory extends Factory
{
    protected $model = Subscriber::class;

    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
        ];
    }

}
