<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'item_code' => 'MI001',
                'name' => 'Indomie Kuah Soto',
                'unit' => 'dus',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'items_code' => 'MI002',
                'name' => 'Indomie Kuah Kare Spesial',
                'unit' => 'dus',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'items_code' => 'MI003',
                'name' => 'Indomie Goreng Original',
                'unit' => 'dus',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
