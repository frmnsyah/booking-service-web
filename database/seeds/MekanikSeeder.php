<?php

use App\Mekanik;
use Illuminate\Database\Seeder;

class MekanikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Mekanik::truncate();
        $items = [
            ['nama' => 'Budi', 'no_mekanik' => '001', 'created_at' => now()],
            ['nama' => 'Sugiman', 'no_mekanik' => '002', 'created_at' => now()],
            ['nama' => 'Warsono', 'no_mekanik' => '003', 'created_at' => now()],
            ['nama' => 'Jamal', 'no_mekanik' => '004', 'created_at' => now()]
        ];

        foreach ($items as $item) {
            $model = new Mekanik();
            \App\Mekanik::insert($item);
        }
    }
}
