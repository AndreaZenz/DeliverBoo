<?php


use Illuminate\Database\Seeder;
use App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Ristorante', 'Pizzeria', 'Pescheria', 'Griglieria', 'Risotteria', 'Sushi', 'Cinese', 'Koreano', 'Thailandese'];
        
        foreach ($types as $type){
            $new_type_object = new Type();
            $new_type_object->name = $type;
            $new_type_object->save();
        }
    }
}
