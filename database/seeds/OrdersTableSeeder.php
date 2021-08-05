<?php

use App\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('Orders')->count() == 0) {

            DB::table('Orders')->insert([
                [
                    'client_name' => 'Florian Leica',
                    'client_email' => 'FlorianNelCuore@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',
                    'restaurant_id' => '1',
                    'total_price' => '25.00',
                    'created_at' => '2021-01-04 15:16:14',
                    'updated_at' => '2021-01-04 15:16:14',
                ],
                [
                    'client_name' => 'Alessio Vietri',
                    'client_email' => 'FlorianNelCuore@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',
                    'restaurant_id' => '1',
                    'total_price' => '50.00',
                    'created_at' => '2021-05-04 15:16:14',
                    'updated_at' => '2021-05-04 15:16:14',
                ],
                [
                    'client_name' => 'Simone Icardi',
                    'client_email' => 'FlorianNelCuore@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',
                    'restaurant_id' => '1',
                    'total_price' => '175.00',
                    'created_at' => '2021-08-04 15:16:14',
                    'updated_at' => '2021-08-04 15:16:14',
                ],
                [
                    'client_name' => 'Alessandro Sainato',
                    'client_email' => 'FlorianNelCuore@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',
                    'restaurant_id' => '1',
                    'total_price' => '100.00',
                    'created_at' => '2021-03-04 15:16:14',
                    'updated_at' => '2021-03-04 15:16:14',
                ],
                [
                    'client_name' => 'Andrea Valeri',
                    'client_email' => 'andreavaleri@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',                 
                    'restaurant_id' => '1',
                    'total_price' => '50.00',
                    'created_at' => '2021-02-04 15:16:14',
                    'updated_at' => '2021-02-04 15:16:14',
                ],
                [
                    'client_name' => 'Simone Maletta',
                    'client_email' => 'simonemaletta@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',
                    'restaurant_id' => '12',
                    'total_price' => '100.00',
                    'created_at' => '2020-08-04 15:16:14',
                    'updated_at' => '2020-08-04 15:16:14',
                ],
                [
                    'client_name' => 'Alessandro Puglisi',
                    'client_email' => 'alessandropuglisi@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9om',
                    'restaurant_id' => '1',
                    'total_price' => '70.00',
                    'created_at' => '2020-08-04 15:16:14',
                    'updated_at' => '2020-08-04 15:16:14',
                ],
                [
                    'client_name' => 'Marco Zhou',
                    'client_email' => 'marcozhou@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',                 
                    'restaurant_id' => '1',
                    'total_price' => '250.00',
                    'created_at' => '2021-06-04 15:16:14',
                    'updated_at' => '2021-06-04 15:16:14',
                ],
                [
                    'client_name' => 'Flavio Cordari',
                    'client_email' => 'flaviocordari@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',
                    'restaurant_id' => '8',
                    'total_price' => '25.00',
                    'created_at' => '2020-02-04 15:16:14',
                    'updated_at' => '2020-02-04 15:16:14',
                ],
                [
                    'client_name' => 'Francesco Elia',
                    'client_email' => 'franescoelia@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',                    
                    'restaurant_id' => '12',
                    'total_price' => '140.00',
                    'created_at' => '2020-10-04 15:16:14',
                    'updated_at' => '2020-10-04 15:16:14',
                ],
                [
                    'client_name' => 'Tony Stark',
                    'client_email' => 'tonystark@gmail.com',
                    'client_address' => 'Piazzale Bande Nere 9',                    
                    'restaurant_id' => '8',
                    'total_price' => '100.00',
                    'created_at' => '2021-7-04 15:16:14',
                    'updated_at' => '2021-7-04 15:16:14',
                ],
                
            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
