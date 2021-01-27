<?php

namespace Database\Factories;

use App\Models\Product;
use Bezhanov\Faker\ProviderCollectionHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        \Bezhanov\Faker\ProviderCollectionHelper::addAllProvidersTo($faker);
        return [
            'name' => $faker->productName,
            'count' => rand(0, 150),
            'unit_price' => mt_rand(1.00, 200.00)/10,
            'category_id' => rand(1, 30)
        ];
    }
}
