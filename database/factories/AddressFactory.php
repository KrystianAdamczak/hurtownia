<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

require_once 'vendor/autoload.php';

class AddressFactory extends Factory
{
    
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        $optional = rand(0, 2);
        $apartmentNumber = null;
        $street = null;
        if($optional === 1) {
            $apartmentNumber = rand(1, 20);
            $optional = rand(0, 2);
        }

        if($optional === 1) 
            $street = $faker->streetName;

        
            $arrayCountries = array(
                "Polska" => "Polska",
                "Deutschland" => "Niemcy",
                "Danmark" => "Dania",
                "Česká republika" => "Czechy",
                "Slovensko" => "Słowacja",
                "Україна" => "Ukraina",
                "Беларусь" => "Białoruś",
            );
        
        return [
            'country' => array_rand($arrayCountries, 1),
            'voivodeship' => $faker->state,
            'county' => $faker->cityPrefix,
            'community' => $faker->citySuffix ,
            'street' => $street,
            'house_number' => rand(1, 150),
            'apartment_number' => $apartmentNumber,
            'city' => $faker->city,
            'postal_code' => $faker->postcode,

        ];
    }
}
