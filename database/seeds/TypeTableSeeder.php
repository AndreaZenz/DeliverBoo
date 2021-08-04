<?php

use App\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        if (DB::table('Types')->count() == 0) {

            DB::table('Types')->insert([
                [
                    'active' => 0,
                    'name' => 'Ristorante',
                    'fontAwesome' => 'fas fa-utensils',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Pizzeria',
                    'fontAwesome' => 'fas fa-pizza-slice',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Pescheria',
                    'fontAwesome' => 'fas fa-fish',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Griglieria',
                    'fontAwesome' => 'fas fa-hamburger',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Risotteria',
                    'fontAwesome' => 'fas fa-concierge-bell',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Sushi',
                    'fontAwesome' => 'fas fa-seedling',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Cinese',
                    'fontAwesome' => 'fas fa-burn',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Koreano',
                    'fontAwesome' => 'fab fa-korvue',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Thailandese',
                    'fontAwesome' => 'fas fa-cocktail',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'active' => 0,
                    'name' => 'Pasticceria',
                    'fontAwesome' => 'fas fa-birthday-cake',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                
            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
