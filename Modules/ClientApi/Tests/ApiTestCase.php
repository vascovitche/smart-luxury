<?php

namespace Modules\ClientApi\Tests;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesApplication;
use Tests\TestCase;

class ApiTestCase extends TestCase
{
    use CreatesApplication
        , RefreshDatabase
        ;

    protected Generator $faker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = Factory::create();
    }

}