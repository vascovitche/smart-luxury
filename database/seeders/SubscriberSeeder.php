<?php

namespace Database\Seeders;

use Database\Factories\OrderFactory;
use Database\Factories\SubscriberFactory;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        (new SubscriberFactory)->count(40)->create();
    }
}
