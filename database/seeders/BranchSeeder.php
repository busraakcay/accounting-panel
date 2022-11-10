<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            ['name' => 'Fahrünnisa Hatun Kyk Kız Öğrenci Yurdu', 'amount_cash' => 15000],
            ['name' => 'Boltat Yemek', 'amount_cash' => 15000],
        ];

        DB::table('branches')->insert($branches);
    }
}
