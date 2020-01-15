<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            DevicesTableSeeder::class,
            BrandsTableSeeder::class,
            ModelsTableSeeder::class,
            StatesTableSeeder::class,
            QualitiesTableSeeder::class,
            WaitsTableSeeder::class,
            SparesTableSeeder::class,
            RolesTableSeeder::class,
            OccupationsTableSeeder::class,
            UsersTableSeeder::class,
            SellersTableSeeder::class,
            DeviceSpareTableSeeder::class,
            DeviceSellerTableSeeder::class,
        ]);
    }
}
