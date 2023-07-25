<?php

namespace Modules\ClientApi\Tests\Feature;

use Modules\ClientApi\Tests\ApiTestCase;

class SubscriberTest extends ApiTestCase
{

    public function test_subscribe()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
        ];

        $response = $this->postJson('/api/v1/subscribers', $data);

        $response->assertOk();

        $this->assertDatabaseHas('subscribers', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    public function test_create_order_validation_failed()
    {
        $data = [
            'name' => $this->faker->numberBetween(1, 30),
            'email' => $this->faker->word,
        ];

        $response = $this->postJson('/api/v1/subscribers', $data);

        $response->assertUnprocessable();
        $response->assertInvalid([
            'name',
            'email',
        ]);
    }

}