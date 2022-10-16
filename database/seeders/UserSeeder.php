<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['username' => 'root', 'email' => 'root@root.com', 'name' => 'Root', 'surname' => 'Root', 'password' => '$2y$10$4LR/3ltwCe7qkT3WPs0nmu9TUC89ffUQL1N/Cos19Lnb/US9MYl6K', 'phone' => '555 555 55 55', 'type' => '1'],
        ];

        DB::table('users')->insert($users);

    }
}
