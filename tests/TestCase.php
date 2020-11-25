<?php

namespace Tests;

use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    /**
     * @var Faker
     */
    protected $faker;

    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');

        $this->faker = Factory::create();
    }
}
