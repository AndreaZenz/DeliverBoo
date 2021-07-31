<?php

use App\Dish;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('dishes')->count() == 0){

            DB::table('dishes')->insert([

                [
                    'name' => 'Carbonara',
                    'price' => '12',
                    'description' => 'La pasta alla carbonara è un piatto caratteristico del Lazio, e più in particolare di Roma, preparato con ingredienti popolari e dal gusto intenso.',
                    'ingredient_list' => 'Uova, Pancetta',
                    'restaurant_id' => '1',
                    'img_url' => 'dish_cover/carbonara.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Amatriciana',
                    'price' => '10',
                    'description' => '',
                    'ingredient_list' => 'Pomodoro, pancetta, peperoncino',
                    'restaurant_id' => '1',
                    'img_url' => 'dish_cover/amatriciana.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Sha Zhu Cai',
                    'price' => '12',
                    'description' => 'Sha Zhu Cai, si tratta di uno stufato a base di pancia di maiale.',
                    'ingredient_list' => 'Sanguinaccio, fegato, tofu, cavolo fermentato, zenzero, coriandolo e peperoncino',
                    'restaurant_id' => '2',
                    'img_url' => 'dish_cover/sha_zhu_cai.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Yuxiangqiezi',
                    'price' => '18',
                    'description' => 'Un piatto-icona della cucina Sichuanese, dolce e acido, saporito e piccante.',
                    'ingredient_list' => 'Melanzane cotte con aglio, zenzero, chili e cipollotti',
                    'restaurant_id' => '2',
                    'img_url' => 'dish_cover/yuxiangqiezi.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pasta di Mandorla',
                    'price' => '12',
                    'description' => 'Le tipiche mandorle siciliane sono utilizzate nella ricetta di molti dolcini e biscotti preparati dalle pasticcerie di ogni città, a base di “pasta reale” o “frutta martorana”.',
                    'ingredient_list' => 'Pomodorini, mandorle siciliane',
                    'restaurant_id' => '3',
                    'img_url' => 'dish_cover/pasta_di_mandorla.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Arancine',
                    'price' => '10',
                    'description' => 'Gli arancini di riso, detti in Sicilia “arancine o arancina”, sono un simbolo della gastronomia regionale.',
                    'ingredient_list' => 'Sugo di carne, piselli e formaggio',
                    'restaurant_id' => '3',
                    'img_url' => 'dish_cover/arancini.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Pad Thai',
                    'price' => '10',
                    'description' => 'Il Pad Thai è il piatto più famoso della cucina thailandese.',
                    'ingredient_list' => 'Pasta di riso fritta, uovo, salsa di pesce, peperoncino, verdure, germogli di soia, gamberi e pollo o tofu.',
                    'restaurant_id' => '4',
                    'img_url' => 'dish_cover/pad_thai.png',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Green Curry',
                    'price' => '15',
                    'description' => 'Uno dei piatti top della cucina Thailandese.',
                    'ingredient_list' => 'Pasta di curry verde, latte di cocco, pollo, verdure miste',
                    'restaurant_id' => '4',
                    'img_url' => 'dish_cover/green_curry.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Double Whopper',
                    'price' => '10',
                    'description' => 'Doppia carne per i grandi appetiti e per coloro che non si accontentano di mangiare un semplice hamburger.',
                    'ingredient_list' => 'Carne, uova, sedano, sesamo.',
                    'restaurant_id' => '5',
                    'img_url' => 'dish_cover/double_whopper.png',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Chili Cheese bites',
                    'price' => '6',
                    'description' => 'Deliziose pepite di formaggio fuso ripiene di jalapenos ricoperte da una leggera panatura.',
                    'ingredient_list' => 'Cheddar, jalapenos',
                    'restaurant_id' => '5',
                    'img_url' => 'dish_cover/chilicb.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Double cheese & baconburger',
                    'price' => '8',
                    'description' => 'Doppio filetto con doppio formaggio.',
                    'ingredient_list' => 'Bacon, insalata, salsa burger',
                    'restaurant_id' => '6',
                    'img_url' => 'dish_cover/double_cheese_burger.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Hot Wings',
                    'price' => '8',
                    'description' => 'Hot & Spicy sono le nostre alette di pollo croccanti, deliziosamente marinate e impanate.',
                    'ingredient_list' => 'Ali di pollo, chili',
                    'restaurant_id' => '6',
                    'img_url' => 'dish_cover/hot_wings_kfc.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Panissa Vercellese',
                    'price' => '15',
                    'description' => 'La panissa vercellese è un piatto tipico piemontese, preparato con gli ingredienti classici della gastronomia tipica locale.',
                    'ingredient_list' => 'Salsiccia, riso e fagioli',
                    'restaurant_id' => '7',
                    'img_url' => 'dish_cover/panissa.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Fritto misto piemontese',
                    'price' => '25',
                    'description' => 'Si tratta di una frittura mista di carne, in particolare di frattaglie.',
                    'ingredient_list' => 'Cervella, fegato, animelle, salsiccia, frutta, ortaggi, amaretti',
                    'restaurant_id' => '7',
                    'img_url' => 'dish_cover/fritto_misto_piemontese.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Ramen',
                    'price' => '15',
                    'description' => "Il ramen è una zuppa ricca di sapori e di aromi che richiamano l'oriente molto diffusa in Giappone.",
                    'ingredient_list' => 'Spaghetti di frumento, brodo di carne, maiale',
                    'restaurant_id' => '8',
                    'img_url' => 'dish_cover/ramen.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Uramaki',
                    'price' => '15',
                    'description' => 'Si tratta di involtini di riso alti circa un paio di centimetri e ripieni di ingredienti diversi.',
                    'ingredient_list' => 'Verdura, frutta, formaggio o pesce',
                    'restaurant_id' => '8',
                    'img_url' => 'dish_cover/uramaki.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Bibimbap',
                    'price' => '15',
                    'description' => 'Il Bibimbap è un insieme di riso, verdure finemente tagliate e un uovo crudo, servito in una ciotola ancora calda bollente, che permette agli ingredienti al suo interno di continuare a cuocersi. ',
                    'ingredient_list' => 'Manzo, uova, zucchine, spinaci, germogli di soia, salsa di soia',
                    'restaurant_id' => '9',
                    'img_url' => 'dish_cover/bibimbap.jpg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Kimchi Jjigae',
                    'price' => '12',
                    'description' => 'Un contorno dall’aroma molto particolare, ottenuto dalla fermentazione di cavolo condito con aglio, zenzero, cipolla, polvere di peperoncino piccante e altri ingredienti che possono variare in base alla zona in cui ci si trova.',
                    'ingredient_list' => 'Kimchi, cipolla, tofu e carne di manzo o maiale',
                    'restaurant_id' => '9',
                    'img_url' => 'dish_cover/kimchi.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Mc Cafè',
                    'price' => '6',
                    'description' => 'Per chi ama il classico americano, la classica Cheesecake, con le fragole.',
                    'ingredient_list' => 'Plastica',
                    'restaurant_id' => '10',
                    'img_url' => 'dish_cover/cheesecake.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Nutella Sweety',
                    'price' => '4',
                    'description' => 'Due soffici fette di plastica ripiene di Nutella.',
                    'ingredient_list' => 'Plastica, Nutellazza',
                    'restaurant_id' => '10',
                    'img_url' => 'dish_cover/nutella_sweety.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Pizza Napoletana Verace',
                    'price' => '14',
                    'description' => 'La vera pizza napoletana Verace.',
                    'ingredient_list' => 'Pomodoro, Mozzarella di Bufala, Origano',
                    'restaurant_id' => '11',
                    'img_url' => 'dish_cover/pizza_verace.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Pizza Salsiccia & Friarielli',
                    'price' => '12',
                    'description' => 'La pizza salsiccia e friarielli è un piatto tipico della cucina campana.',
                    'ingredient_list' => 'Salsiccia, Friarielli',
                    'restaurant_id' => '11',
                    'img_url' => 'dish_cover/pizza_salsiccia_friarielli.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

                [
                    'name' => 'Tartine al cioccolato',
                    'price' => '9',
                    'description' => 'Tartine al cioccolato.',
                    'ingredient_list' => 'Cioccolato',
                    'restaurant_id' => '12',
                    'img_url' => 'dish_cover/tartine_cioccolato.jpeg',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
