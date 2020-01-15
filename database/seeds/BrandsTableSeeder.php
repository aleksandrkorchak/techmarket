<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['name' => 'Apple'],
            ['name' => 'Samsung'],
            ['name' => 'LG'],
            ['name' => 'Huawei'],
            ['name' => 'ZTE'],
            ['name' => 'Sony'],
            ['name' => 'Asus'],
            ['name' => 'Motorola'],
            ['name' => 'Lenovo'],
            ['name' => 'CATERPILLAR'],
            ['name' => 'Xiaomi'],
            ['name' => 'Meizu'],
        ]);
    }
}
