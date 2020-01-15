<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellers')->insert([
            [
                'user_id' => 1,
                'organization' => 'E17',
                'occupation_id' => 1
            ],
            [
                'user_id' => 2,
                'organization' => 'Seller1',
                'occupation_id' => 2
            ],
            [
                'user_id' => 3,
                'organization' => 'Seller2',
                'occupation_id' => 1
            ],
        ]);
    }
}
