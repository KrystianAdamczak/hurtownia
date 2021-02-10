<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

require_once 'vendor/autoload.php';

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        $optional = rand(0, 2);
        $second_name = null;
        $email = null;
        $NIP = null;

        if($optional == 1) {
            $second_name = $faker->firstName;
            $optional = rand(0, 2);
        }

        if($optional == 1) {
            $email = $faker->freeEmail;
            $optional = rand(0, 2);
        }

        if($optional == 1) {
            $NIP = rand(1000000000, 9999999999);
        }

        return [
            'address_id' => rand(1, 500),
            'name' => $faker->firstName,
            'second_name' => $second_name,
            'surname' => $faker->lastName,
            'phone_number' => $faker->phoneNumber,
            'email' => $email,
            'NIP' => $NIP,

        ];
    }
}
