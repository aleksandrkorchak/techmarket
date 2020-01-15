<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            ['name' => 'Смартфон', 'category' => 'Смартфоны'],
            ['name' => 'Планшет', 'category' => 'Планшеты'],
            ['name' => 'Ноутбук', 'category' => 'Ноутбуки'],
            ['name' => 'Моноблок', 'category' => 'Моноблоки'],
            ['name' => 'Нетбук', 'category' => 'Нетбуки']
        ]);
    }
}
