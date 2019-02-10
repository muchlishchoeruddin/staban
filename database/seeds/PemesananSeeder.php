<?php

use Illuminate\Database\Seeder;
use App\Pemesanan;
use App\Rute;

class PemesananSeeder extends Seeder
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
        for ($i=1; $i <= 147; $i++) { 
        	$tp = $faker->randomElement($array = array ('2019-04-10','2019-04-11','2019-04-12'));
        	$tb =  $faker->randomElement($array = array ('2019-04-17'));
        	$rute = Rute::find($faker->randomElement($array = array ('1','2','3')));
    		Pemesanan::create([
    			'kode_pemesanan'=>'L'.$i,
    			'tgl_pemesanan'=>$tp,
    			'id_user'=>'3',
    			'kode_kursi'=>'A1',
    			'id_rute'=>2,
                'tujuan'=>'Jakarta',
    			'penumpang'=>1,
                'verifikasi'=>'M2yM10MExdOidKKAL8ulNwAOCnTwOSTfguKGgBrkMjdWuNQXHSEYKZgqVMfW.png',
                'tgl_berangkat'=>$tb,
                'jam_berangkat'=>$rute->jam_berangkat,
    			'jam_checkin'=>date('H:i:s', strtotime('-1 hours', strtotime($rute->jam_berangkat))),
    			'total_bayar'=>'300000',
                'status'=>'3',
    			'updated_at'=>date('Y-m-d H:i:s')
    		]);
    	}
	}
}