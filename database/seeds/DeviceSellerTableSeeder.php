<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceSellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('device_seller')->insert([
            ['seller_id' => 1, 'device_id' => 1],
            ['seller_id' => 1, 'device_id' => 2],
            ['seller_id' => 1, 'device_id' => 3],
            ['seller_id' => 1, 'device_id' => 4],
            ['seller_id' => 1, 'device_id' => 5],
        ]);
    }
}
