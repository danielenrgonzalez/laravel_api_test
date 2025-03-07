<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = Currency::all();

        Product::create([
            'name' => 'Producto1',
            'description' => 'Producto1',
            'price' => 5,
            'currency_id' => $currencies[0]->id,
            'tax_cost' => 1,
            'manufacturing_cost' => 0.5,
        ])->price_products()->create([
            'price' => 5 * $currencies[0]->exchange_rate,
            'currency_id' => $currencies[0]->id,
        ]);

        Product::create([
            'name' => 'Producto2',
            'description' => 'Producto2',
            'price' => 1 * $currencies[1]->exchange_rate,
            'currency_id' => $currencies[1]->id,
            'tax_cost' => 1,
            'manufacturing_cost' => 0.5,
        ])->price_products()->create([
            'price' => 1 * $currencies[1]->exchange_rate,
            'currency_id' => $currencies[1]->id,
        ]);

        Product::create([
            'name' => 'Producto3',
            'description' => 'Producto3',
            'price' => 1 * $currencies[2]->exchange_rate,
            'currency_id' => $currencies[2]->id,
            'tax_cost' => 1,
            'manufacturing_cost' => 0.5,
        ])->price_products()->create([
            'price' => 1 * $currencies[2]->exchange_rate,
            'currency_id' => $currencies[2]->id,
        ]);
    }
}
