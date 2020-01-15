<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            //admin
            [
                'id' => 1,
                'email' => 'admin@mail.ru',
                'city' => 'Киев',
                'phone' => '0984853902',
                'login' => 'admin',
                'password' => '$2y$10$ZOzFY1MKUGEZOAtS5.YXaesm8nMU8SGFn66EQvYdwfZnnErE1mbRi',
                'role_id' => 3,
                'created_at' => '2019-04-05 11:18:39',
                'updated_at' => '2019-04-05 12:18:39',
            ],
            //seller1
            [
                'id' => 2,
                'email' => 'seller1@mail.ru',
                'city' => 'Львов',
                'phone' => '0987895943',
                'login' => 'seller1',
                'password' => '$2y$10$ZOzFY1MKUGEZOAtS5.YXaesm8nMU8SGFn66EQvYdwfZnnErE1mbRi',
                'role_id' => 2,
                'created_at' => '2019-02-03 09:09:35',
                'updated_at' => '2019-04-03 09:18:01',
            ],
            //seller2
            [
                'id' => 3,
                'email' => 'seller2@mail.ru',
                'city' => 'Днепр',
                'phone' => '0957091922',
                'login' => 'seller2',
                'password' => '$2y$10$ZOzFY1MKUGEZOAtS5.YXaesm8nMU8SGFn66EQvYdwfZnnErE1mbRi',
                'role_id' => 2,
                'created_at' => '2019-01-02 12:23:14',
                'updated_at' => '2019-01-07 21:07:44',
            ],
            //customer1
            [
                'id' => 4,
                'email' => 'customer1@mail.ru',
                'city' => 'Харьков',
                'phone' => '0969998833',
                'login' => 'customer1',
                'password' => '$2y$10$ZOzFY1MKUGEZOAtS5.YXaesm8nMU8SGFn66EQvYdwfZnnErE1mbRi',
                'role_id' => 1,
                'created_at' => '2018-05-02 14:00:51',
                'updated_at' => '2018-06-07 10:07:33',
            ],
            //customer2
            [
                'id' => 5,
                'email' => 'customer2@mail.ru',
                'city' => 'Херсон',
                'phone' => '0667390629',
                'login' => 'customer2',
                'password' => '$2y$10$ZOzFY1MKUGEZOAtS5.YXaesm8nMU8SGFn66EQvYdwfZnnErE1mbRi',
                'role_id' => 1,
                'created_at' => '2018-09-02 15:22:20',
                'updated_at' => '2018-11-07 14:40:24',
            ],
        ]);
    }
}
