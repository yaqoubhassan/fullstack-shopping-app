<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;

class InvoiceItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        $invoices = DB::table('invoices')->pluck('id')->toArray();
        $products = DB::table('products')->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            DB::table('invoice_items')->insert([
                'invoice_id' => $faker->randomElement($invoices),
                'product_id' => $faker->randomElement($products),
                'quantity' => $faker->numberBetween(1, 10),
                'price' => $faker->randomFloat(2, 10, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
