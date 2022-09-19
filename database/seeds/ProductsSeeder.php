<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'T-Shirt',
            'price' => 29.50,
            'stock' => 350
        ]);

        DB::table('products')->insert([
            'name' => 'Skirt',
            'price' => 55.65,
            'stock' => 258
        ]);
    }
}
