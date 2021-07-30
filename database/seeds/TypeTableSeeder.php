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
        $types = ['Ristorante', 'Pizzeria', 'Pescheria', 'Griglieria', 'Risotteria', 'Sushi', 'Cinese', 'Koreano', 'Thailandese', 'Pasticceria'];

        if(DB::table('Types')->count() == 0){

            foreach ($types as $type){
                $new_type_object = new Type();
                $new_type_object->name = $type;
                $new_type_object->save();
            }
            // DB::table('users')->insert([

            //     [
            //         'name' => 'Simone',
            //         'created_at' => date('Y-m-d H:i:s'),
            //         'updated_at' => date('Y-m-d H:i:s'),
            //     ],
            //     [
            //         'name' => 'Alessandro',
            //         'created_at' => date('Y-m-d H:i:s'),
            //         'updated_at' => date('Y-m-d H:i:s'),
            //     ],
            //     [
            //         'name' => 'Andrea',
            //         'created_at' => date('Y-m-d H:i:s'),
            //         'updated_at' => date('Y-m-d H:i:s'),
            //     ],
            //     [
            //         'name' => 'Marco',
            //         'created_at' => date('Y-m-d H:i:s'),
            //         'updated_at' => date('Y-m-d H:i:s'),
            //     ],

            // ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
