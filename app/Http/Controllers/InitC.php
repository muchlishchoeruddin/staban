<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Rute;
use Auth;
use Cookie;
use Faker\Factory as Faker;

class InitC extends Controller
{
    //
    public function validasi()
    {
    	if (Auth::user()->id_level==1) {
    		return redirect('/admin');
    	}else if (Auth::user()->id_level==2) {
    		return redirect('/petugas/dashboard');
    	}else {
    		return redirect('/');
    	}
    }
    public function check()
    {
        // $faker = Faker::create();
        // // $random = $faker->regexify('[A-Z]+[A-Z]+[A-Z]+[A-Z]');
        // do{
        //     $random = substr($faker->regexify('[A-Z]+[A-Z]+[A-Z]+[A-Z]+[A-Z]+[A-Z]'),0,6);
        //     $data = Pemesanan::where('kode_pemesanan',$random)->get();
        // }
        // while(count($data)>0);//ketika data yang dicari lebih dari 0 maka pencarian data yang lebih dari 0 dihentikan dan dapatlah data yang == 0

        // echo $random.' and '.count($data);
        // $data = [];
        // for ($i=1; $i <= 3; $i++) { 
        //     $data[] = ['titel'=>'tuan','nama'=>'sukijan'.$i,'nopengenal'=>'070402'];
        // }
        // $encode = json_encode($data);
        // return view('check',['data'=>$encode]);
        return view('email');
        // Cookie::queue('pending',[],5000);
        // dump(count(Cookie::get('pending')));

    }
    public function gdatujuan($ruteawal)
    {
        $data = Rute::where('dari',str_replace('%20',' ',$ruteawal))->groupBy('tujuan')->get();
        return response()->json($data,200);
    }
    public function gduser()
    {
        $data = Auth::user();
        return response()->json($data,200);
    }
}
