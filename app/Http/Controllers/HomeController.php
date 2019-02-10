<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Rute;
use Faker\Factory as Faker;
use Cookie;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function tracking()
    {
        $pemesanan = Pemesanan::where(['id_user'=>Auth::id(),'status'=>'1'])->get();
        return view('pemesanan.tracking',['data'=>$pemesanan]);
    }
    public function detaildata($id)
    {
        $data = Pemesanan::where(['id_user'=>Auth::id(),'id_pemesanan'=>$id])->first();
        return view('pemesanan.detaildata',['data'=>$data]);
    }
    public function transaksi()
    {
        $pemesanan = Pemesanan::where('status','2')->orWhere('status','3')->orderBy('updated_at','DESC')->get();
        $pemesanan2 = Pemesanan::where(['id_user'=>Auth::id(),'status'=>'2'])->orderBy('updated_at','DESC')->get();
        $pemesanan3 = Pemesanan::where(['id_user'=>Auth::id(),'status'=>'3'])->orderBy('updated_at','DESC')->get();
        return view('pemesanan.transaksi',['data'=>$pemesanan,'data2'=>$pemesanan2,'data3'=>$pemesanan3]);
    }
}