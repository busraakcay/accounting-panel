<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $income_types = [
            ['name' => 'Günlük Gelir'],
            ['name' => 'Posttan Gelenler'],
            ['name' => 'Hakediş'],
        ];

        DB::table('income_types')->insert($income_types);
    }
}
