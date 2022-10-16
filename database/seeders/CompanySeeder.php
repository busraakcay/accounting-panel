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
            ['name' => 'gfdfdg', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'fgd', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'nfghngh', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'Sgffgbütaş', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'Sünvbngtaş', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'aaaa', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'dsdsdsd', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'Süvcvcvcvtaş', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'rtrty', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'fgjöjk', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'ytutyu', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'urtert', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'şlkşklş', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'dfdvxvcv', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'cbvcc', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'yuututun', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'öönmghfh', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'drtwfsdf', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'mkhgjkg', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'tryryrh', 'description' => 'Süt ve süt ürünleri'],
            ['name' => 'bccghd', 'description' => 'Süt ve süt ürünleri'],
        ];

        DB::table('companies')->insert($companies);
    }
}
