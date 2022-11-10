<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            ['name' => 'Sütaş', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'Ülker', 'description' => 'Kantin'],
            ['name' => 'Eti', 'description' => 'Kantin'],
            ['name' => 'İçim', 'description' => 'Süt ve süt ürünleri'],
        ];

        DB::table('companies')->insert($companies);
    }
}
