<?php
namespace App\Services;

use Faker\Factory;
use Faker\Generator as Faker;

class NoteCodeService
{
    /**
     * @var Faker
     */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('Ru_RU');
    }

    public function generateCode() : string
    {
       return $this->faker->words(2, true);
    }
}

