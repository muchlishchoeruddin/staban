<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Notifikasi;
use Mail;

class PetugasC extends Controller
{
    //
    public function index()
    {
    	return view('petugas.index');
    }
    public function blumverifikasi()
    {
    	$data = Pemesanan::where('status',2)->orderBy('updated_at','DESC')->get();
    	return view('petugas.blumverifikasi',['data'=>$data]);
    }
    public function sdhverifikasi()
    {
    	$data = Pemesanan::where('status',3)->orderBy('updated_at','DESC')->get();
    	return view('petugas.sdhverifikasi',['data'=>$data]);
    }
    public function verifikasi($id)
    {
        
        $data = Pemesanan::find($id);
        $jsondecode = json_decode($data->data_penumpang);
        Mail::send('email',['data'=>$data,'jsondecode'=>$jsondecode], function ($message) use($jsondecode){
            $message->subject('Tiket Anda telah diVERIFIKASI!!!');
            $message->from('staban@staban.com','STABAN');
            $message->to($jsondecode[0]->mail);
        });
        if (Mail::failures()) {
            echo "asd";
        }else{
            $data->update(['status'=>3]);
            Notifikasi::create([
                'id_user'=>$data->id_user,
                'id_pemesanan'=>$data->id_pemesanan,
                'message'=>'Tiket dengan kode pemesanan '.$data->kode_pemesanan.' telah diverifikasi. anda dapat mengecheck tiketnya di email anda',
                'status'=>'1',
            ]);    
        }
        // dump($jsondecode[0]->mail);
        // echo "<input type='checkbox' checked>";
    	return redirect('/petugas/sdhverifikasi')->with('success','Kode Pemesanan '.$data->kode_pemesanan.' Berhasil Diverifikasi');
    }
}
