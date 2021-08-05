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
        $this->call(UserSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(RestaurantsTypeTableSeeder::class);
        $this->call(DishesTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
    }
}
