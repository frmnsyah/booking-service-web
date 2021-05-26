<?php

use Illuminate\Database\Seeder;

class LookupValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\LookupValues::truncate();
        $items = [
            ['created_at' => now(), 'type' => 'TYPE_MOBIL', 'values' => 'Automatic',],
            ['created_at' => now(), 'type' => 'TYPE_MOBIL', 'values' => 'Manual',],
            ['created_at' => now(), 'type' => 'JENIS_MOBIL', 'values' => 'Avanza',],
            ['created_at' => now(), 'type' => 'JENIS_MOBIL', 'values' => 'Innova',],
            ['created_at' => now(), 'type' => 'JENIS_MOBIL', 'values' => 'Calya',],
            ['created_at' => now(), 'type' => 'JENIS_MOBIL', 'values' => 'Fortunner',],
            ['created_at' => now(), 'type' => 'JENIS_MOBIL', 'values' => 'Vios',],
            ['created_at' => now(), 'type' => 'JENIS_MOBIL', 'values' => 'Agya',],
            ['created_at' => now(), 'type' => 'JENIS_MOBIL', 'values' => 'Alphard',],
        ];

        foreach ($items as $item) {
            \App\LookupValues::insert($item);
        }
    }
}
