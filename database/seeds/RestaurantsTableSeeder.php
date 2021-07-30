<?php

use App\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('restaurants')->count() == 0){

            DB::table('restaurants')->insert([

                [
                    'name' => 'Ristorante al Colosseo',
                    'address' => 'Via Del Corso 1',
                    'img_url' => 'restaurants_cover/al_colosseo.webp',
                    'user_id' => '3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ristorante La Grande Muraglia',
                    'address' => 'Via Dante Alighieri 8',
                    'img_url' => 'restaurants_cover/la_grande-muraglia.jpeg',
                    'user_id' => '4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pizzeria Palermo Bedda',
                    'address' => 'Via Leonardo Da Vinci 12',
                    'img_url' => 'restaurants_cover/palermo.jpeg',
                    'user_id' => '2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Magic Thailand',
                    'address' => 'Via Valentino Rossi 46',
                    'img_url' => 'restaurants_cover/magic_thailand.jpeg',
                    'user_id' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Burger King',
                    'address' => 'Via Alessandro Sainato 21',
                    'img_url' => 'restaurants_cover/burger_king.jpeg',
                    'user_id' => '4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'KFC',
                    'address' => 'Via Verdi 31',
                    'img_url' => 'restaurants_cover/kfc.jpeg',
                    'user_id' => '2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Il mare a quadretti',
                    'address' => 'Viale Garibaldi 31',
                    'img_url' => 'restaurants_cover/il_mare_a_quadretti.png',
                    'user_id' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Shibuya',
                    'address' => 'Porta Palazzo 12',
                    'img_url' => 'restaurants_cover/shibuya.jpeg',
                    'user_id' => '3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Incheon',
                    'address' => 'Corso Giulio Cesare 320',
                    'img_url' => 'restaurants_cover/incheon.jpeg',
                    'user_id' => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Mc Cafè',
                    'address' => 'Stazione centrale',
                    'img_url' => 'restaurants_cover/mc_cafe.jpeg',
                    'user_id' => '2',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Bella Amalfi',
                    'address' => 'Via Appia Nuova 156',
                    'img_url' => 'restaurants_cover/bella_amalfi.jpeg',
                    'user_id' => '4',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Bislakko Pastry',
                    'address' => 'Corso Vercelli 326',
                    'img_url' => 'restaurants_cover/bislakko.jpeg',
                    'user_id' => '3',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
        
        // foreach($restautants as $restautant){
        //     $new_restaurant_object = new Restaurant();
        //     $new_restaurant_object->name = $restautant;
        //     $new_restaurant_object->save();
        // }
