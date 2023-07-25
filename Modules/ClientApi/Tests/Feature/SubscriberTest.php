<?php

namespace Modules\ClientApi\Tests\Feature;

use Database\Factories\SubscriberFactory;
use Modules\ClientApi\Tests\ApiTestCase;
use Spatie\Newsletter\Facades\Newsletter;

class SubscriberTest extends ApiTestCase
{

    public function test_subscribe()
    {
        $data = [
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'email' => $this->faker->email,
        ];

        $response = $this->postJson('/api/v1/subscribers', $data);

        $response->assertOk();

        $this->assertDatabaseHas('subscribers', [
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
        ]);

        $this->assertTrue(Newsletter::hasMember($data['email']));
    }

    public function test_subscribe_update()
    {
        $subscriber = (new SubscriberFactory())->create();

        Newsletter::subscribeOrUpdate($subscriber->email, [
            'FNAME' => $subscriber->name,
            'LNAME' => $subscriber->surname,
        ]);

        $data = [
            'name' => $this->faker->name,
            'surname' => $this->faker->lastName,
            'email' => $subscriber->email,
        ];

        $response = $this->postJson('/api/v1/subscribers', $data);

        $response->assertOk();

        $this->assertDatabaseHas('subscribers', [
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
        ]);

        $this->assertDatabaseMissing('subscribers', [
            'name' => $subscriber->name,
            'surname' => $subscriber->surname,
        ]);

        $this->assertTrue(Newsletter::hasMember($subscriber->email));

        $updatedSubscriber = Newsletter::getMember($subscriber->email);

        $this->assertTrue($updatedSubscriber['email_address'] == $subscriber->email);
        $this->assertTrue($updatedSubscriber['merge_fields']['FNAME'] == $data['name'] &&
            $updatedSubscriber['merge_fields']['FNAME'] != $subscriber->name);
        $this->assertTrue($updatedSubscriber['merge_fields']['LNAME'] == $data['surname'] &&
            $updatedSubscriber['merge_fields']['LNAME'] != $subscriber->surname);
    }

    public function test_subscribe_validation_failed()
    {
        $data = [
            'name' => $this->faker->numberBetween(1, 30),
            'surname' => $this->faker->numberBetween(1, 30),
            'email' => $this->faker->word,
        ];

        $response = $this->postJson('/api/v1/subscribers', $data);

        $response->assertUnprocessable();
        $response->assertInvalid([
            'name',
            'surname',
            'email',
        ]);
    }

}