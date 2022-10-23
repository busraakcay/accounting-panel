<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expense_types = [
            ['name' => 'Fatura'],
            ['name' => 'Hammadde'],
            ['name' => 'İşçilik'],
            ['name' => 'SGK'],
            ['name' => 'Maliye'],
        ];

        DB::table('expense_types')->insert($expense_types);
    }
}
