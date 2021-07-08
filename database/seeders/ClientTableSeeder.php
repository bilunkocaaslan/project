<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([

            [

               "name" => "Bilun",
               "surname" => "Kocaaslan",
               "email" => "bilunkocaaslan@hotmail.com",
               "phone" => "5698754125",
               "api_key" => "asTy_8shU_Wrt4_h2G7",
            ],

            [

                "name" => "Berra",
                "surname" => "Öz",
                "email" => "berraoz@hotmail.com",
                "phone" => "85479652368",
                "api_key" => "5Agy_862d_ıhrT_hfDT",
             ],
             [

                "name" => "Şevval",
                "surname" => "Özdaban",
                "email" => "sevvalozdaban@hotmail.com",
                "phone" => "8745963215",
                "api_key" => "g4Rt_poT3_Şvy1_19Gt",
             ],
            ]);
    }
}
