<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Categories::truncate();
        $items = [
            ['created_at' => now(),'kategori' => 'Service Berkala 1000 km'],
            ['created_at' => now(),'kategori' => 'Service Berkala 4000 km'],
            ['created_at' => now(),'kategori' => 'Service Berkala 8000 km'],
            ['created_at' => now(),'kategori' => 'Service Berkala 12000 km'],
            ['created_at' => now(),'kategori' => 'Service Lainnya']
        ];

        foreach ($items as $item) {
            \App\Categories::insert($item);
        }
    }
}
