<?php

use Illuminate\Database\Seeder;
use App\Rute;

class RuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i=1; $i < 50; $i++) { 
        	Rute::create([
        		'dari'=>'Subang',
        		'tujuan'=>'Jakarta',
        		'jam_berangkat'=>$faker->time($format='H:i:s'),
        		'rute_awal'=>$faker->streetName,
        		'rute_akhir'=>$faker->streetName,
        		'harga'=>$faker->randomElement($array = array('80000','70000','90000','100000','60000','120000')),
        		'id_transportasi'=>$faker->randomElement($array = array('4','5','6'))
        	]);
        }
    }
}
