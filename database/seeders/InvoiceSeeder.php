<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Create 10 fake invoices
        for ($i = 0; $i < 10; $i++) {
            DB::table('invoices')->insert([
                'invoice_number' => 'INV-' . $faker->unique()->numberBetween(1000, 9000),
                'invoice_date' => $faker->date(),
                'customer_info' => $faker->company,
                'supplier_info' => $faker->company,
                'total_amount' => $faker->randomFloat(2, 100, 10000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
