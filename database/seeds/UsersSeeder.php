<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();
        $items = [
            [
                'email' => 'admin@admin.com', 
                'username' => 'admin', 
                'password' => app('hash')->make('123123'), 
                'level' => 'A', 
            ],
            [
                'email' => 'test@test.com', 
                'username' => 'test@test.com', 
                'password' => app('hash')->make('123123'), 
                'level' => null, 
            ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
