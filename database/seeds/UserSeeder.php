<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'surname' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        //     'phone' => Str::random(10),
        //     'p_iva' => Str::random(11),
        // ]);

        if(DB::table('users')->count() == 0){

            DB::table('users')->insert([

                [
                    'name' => 'Simone',
                    'surname' => 'Maletta',
                    'email' => 'simonemaletta@gmail.com',
                    'password' => 'simonemaletta',
                    'phone' => '33312345671',
                    'p_iva' => '12345678911',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Alessandro',
                    'surname' => 'Puglisi',
                    'email' => 'alessandropuglisi@gmail.com',
                    'password' => 'alessandropuglisi',
                    'phone' => '33312345672',
                    'p_iva' => '12345678912',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Andrea',
                    'surname' => 'Valeri',
                    'email' => 'andreavaleri@gmail.com',
                    'password' => 'andreavaleri',
                    'phone' => '33312345673',
                    'p_iva' => '12345678913',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Marco',
                    'surname' => 'Zhou',
                    'email' => 'marcozhou@gmail.com',
                    'password' => 'marcozhou',
                    'phone' => '33312345674',
                    'p_iva' => '12345678914',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],

            ]);
            
        } else { echo "\e[31mTable is not empty, therefore NOT "; }
    }
}
