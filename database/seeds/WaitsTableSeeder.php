<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waits')->insert([
            ['name' => '1 день', 'interval' => 'P1D'],
            ['name' => '1 неделя', 'interval' => 'P1W'],
            ['name' => '2 недели', 'interval' => 'P2W'],
            ['name' => '1 месяц', 'interval' => 'P1M'],
        ]);
    }
}
