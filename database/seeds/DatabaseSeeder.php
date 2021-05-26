<?php

use App\LookupValues;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(LookupValuesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(MekanikSeeder::class);
    }
}
