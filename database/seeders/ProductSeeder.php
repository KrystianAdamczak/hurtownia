<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

    private $productData = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()
        ->count(2000)
        ->create();
    }
}
