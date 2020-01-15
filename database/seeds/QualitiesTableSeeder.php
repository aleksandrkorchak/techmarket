<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QualitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualities')->insert([
            ['name' => 'Оригинал'],
            ['name' => 'High copy'],
            ['name' => 'AAA'],
            ['name' => 'Неважно']
        ]);
    }
}
