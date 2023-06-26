<?php

namespace Modules\ClientApi\Tests\Feature;

use App\Enums\OrderStatus;
use Modules\ClientApi\Tests\ApiTestCase;

class OrderTest extends ApiTestCase
{

    public function test_create_order()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
        ];

        $response = $this->postJson('/api/v1/orders', $data);

        $response->assertOk();

        $this->assertDatabaseHas('orders', [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'status' => OrderStatus::NEW
        ]);
    }

    public function test_create_order_validation_failed()
    {
        $data = [
            'name' => $this->faker->numberBetween(1, 30),
            'email' => $this->faker->word,
            'phone_number' => $this->faker->word,
        ];

        $response = $this->postJson('/api/v1/orders', $data);

        $response->assertUnprocessable();
        $response->assertInvalid([
            'name',
            'email',
            'phone_number',
        ]);
    }

}