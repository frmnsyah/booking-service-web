<?php

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Customers::truncate();
        $items = [
            ['created_at' => now(),'user_id' => 2, 'nama' => 'Test Customer', 'alamat' => 'Jl. Test 123', 'no_hp' => '0889182919'],
        ];

        foreach ($items as $item) {
            \App\Customers::insert($item);
        }
    }
}
