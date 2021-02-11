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
        $faker = \Faker\Factory::create('pl_PL');

        $optional = rand(0, 2);
        $second_name = null;
        $email = null;
        $PESEL = null;
        $NIP = null;
        $gender = "m";
        $name = $faker->firstNameMale;
        $surname = $faker->lastNameMale;

        if($optional == 1) {
            $NIP = rand(1000000000, 9999999999);
            $optional = rand(0, 2);
        }

        if($optional == 1) {
            $PESEL = $faker->pesel;
            $optional = rand(0, 2);
        }

        if($optional == 1) {
            $gender = "k";
            if($gender === "k") {
                $name = $faker->firstNameFemale;
                $surname = $faker->lastNameFemale;
            }

        }
        $optional = rand(0, 2); 
        
        if($optional == 0) {
            $bezPolskichZnakowImie = strtolower(strtr($name, "ĄĆĘŁŃÓŚŻŹśąćęłńóśżź", "acelnoszzsacelnoszz"));
            $bezPolskichZnakowNazwisko =  strtolower(strtr($surname, "ĄĆĘŁŃÓŚŻŹśąćęłńóśżź", "acelnoszzsacelnoszz"));
            $email = substr(utf8_encode($bezPolskichZnakowImie), 0, 1) . '.' . utf8_encode($bezPolskichZnakowNazwisko) . rand(0, 999) . '@' . $faker->freeEmailDomain;

        }
        $optional = rand(0, 2);

        if($optional == 1) {
            if($gender === "k")
                $second_name = $faker->firstNameFemale;
            else
                $second_name = $faker->firstNameMale;
            $optional = rand(0, 2);
        }


        


        return [
            'address_id' => rand(1, 500),
            'name' => $name,
            'second_name' => $second_name,
            'surname' => $surname,
            'phone_number' => $faker->phoneNumber,
            'email' => $email,
            'PESEL' => $PESEL,
            'NIP' => $NIP,

        ];
    }
}
