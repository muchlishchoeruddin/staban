<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\Notifikasi;
use App\Pemesanan;
use Faker\Factory as Faker;
// use App\Pemesanan;
// use App\Transportasi;
// use App\Typetransportasi;
use Auth;
use Cookie;

class PemesananC extends Controller
{
    //
    
	public function tiket($dari,$tujuan,$tgl,$penumpang,$id_tt)
	{ 
		if (date('Y-m-d')==$tgl) {
			$data = Rute::where('jam_berangkat', '>', date('H:i:s', strtotime('+3 Hours')))->where(['dari'=>$dari,'tujuan'=>$tujuan])
					->with(['transportasi'=>function($transportasi){
						$transportasi->with(['typetransportasi'])->get();
					}])->whereHas('transportasi',function($transportasi) use($id_tt){
						$transportasi->where('id_tt',$id_tt);
					})->orderBy('jam_berangkat','ASC')->paginate(10); 
			# code...
		}else{
			$data = Rute::where(['dari'=>$dari,'tujuan'=>$tujuan])
					->with(['transportasi'=>function($transportasi){
						$transportasi->with(['typetransportasi'])->get();
					}])->whereHas('transportasi',function($transportasi) use($id_tt){
						$transportasi->where('id_tt',$id_tt);
					})->orderBy('jam_berangkat','ASC')->paginate(10); 
		}
		$request = ['dari'=>$dari,'tujuan'=>$tujuan,'tgl_berangkat'=>$tgl,'penumpang'=>$penumpang,'id_type_transportasi'=>$id_tt];
		Cookie::queue('tiket', $request, 5000);
		// return response($request);
		return view('pemesanan.tiket',['data'=>$data,'request'=>$request]);
	}
	public function notifikasi()
	{
		Notifikasi::where(['status'=>2,'id_user'=>Auth::id()])->update(['status'=>3]);
		Notifikasi::where(['status'=>1,'id_user'=>Auth::id()])->update(['status'=>2]);
		$data = Notifikasi::where(['id_user'=>Auth::id(),'status'=>2])->paginate(10);
		$data2 = Notifikasi::where(['id_user'=>Auth::id(),'status'=>3])->paginate(10);
		return view('pemesanan.notifikasi',['data'=>$data,'data2'=>$data2]);
	}
	public function detailpenumpang(Request $request)
    {
		if ($request->isMethod('GET')) {
	        return view('pemesanan.detailpenumpang',['data'=>Cookie::get('pending')]);
		}else{
	        // dump($code);
	        $desc = Pemesanan::all();
	        // return response($desc);
	        $faker = Faker::create();
	        $rute = Rute::find($request->id_rute);
	        $kursi = array();
	                for ($i=1; $i <= $rute->transportasi->jml_kursi; $i++) {
	                    if (strlen($i)==1) {
	                        $kursi[] = $rute->transportasi->kode_transportasi.'00'.$i;
	                    }else if (strlen($i)==2) {
	                        $kursi[] = $rute->transportasi->kode_transportasi.'0'.$i;
	                    }else{
	                        $kursi[] = $rute->transportasi->kode_transportasi.$i;
	                    }
	                }
	        do{
	            $data = $faker->randomElement($array = $kursi);
	            $jika = Pemesanan::where('kode_pemesanan',$data)->get();
	        }
	        while (count($jika)!=0);
	        do{
	            $uniquecode = $faker->regexify('[A-Z]+[A-Z]+[A-Z]+[A-Z]+[A-Z]+[A-Z]');
	            $substruc = substr($uniquecode,0,6);
	            $findsamecode = Pemesanan::where('kode_pemesanan',$substruc)->get();
	        }while(count($findsamecode)>0);

	        // $cookie = Cookie::get('pending');

	        $pemesanan = [
	            'kode_pemesanan'=>$substruc,
	            'tgl_pemesanan'=>date('Y-m-d H:i:s'),
	            'id_user'=>Auth::id(),
	            'kode_kursi'=>$data,
	            'id_rute'=>$rute->id_rute,
	            'tujuan'=>$request->tujuan,
	            'penumpang'=>$request->penumpang,
	            'verifikasi'=>'',
	            'tgl_berangkat'=>$request->tgl_berangkat,
	            'jam_berangkat'=>$rute->jam_berangkat,
	            'jam_checkin'=>date('H:i:s',strtotime('-1 hours',strtotime($rute->jam_berangkat))),
	            'total_bayar'=>$request->penumpang*$rute->harga,
	            'status'=>'1',
	            'updated_at'=>date('Y-m-d H:i:s')
	        ]; 

	        // if (count($cookie) > 0) {
	        //     $pemesanan['icookie'] = count($cookie);
	        //     array_push($cookie, $pemesanan);
	        // } else {
	        //     $pemesanan['icookie'] = 0;
	        //     $cookie = [$pemesanan];
	        // }

	        Cookie::queue('pending',$pemesanan, 180000);

	        // echo "berhasil";
	        // dump(Cookie::get('pending'));
	        // Pemesanan::create($pemesanan);
	        // dump($pemesanan);

	        // dump(count(Cookie::get('pending')));
	        return view('pemesanan.detailpenumpang',['data'=>$pemesanan]);
	        // return view('pemesanan.pembayaran',['data'=>$pemesanan]);
	        // return redirect('/bayartiket/'.$pemesanan['kode_pemesanan']);
	    }
    }
    public function bayartiket(Request $request,$id_pemesanan)
    {
        return view('pemesanan.pembayaran',['data'=>Pemesanan::where('id_pemesanan',$id_pemesanan)->first()]);
    }
    public function uploadbukti(Request $request,$id_pemesanan)
    {
        $namafoto =str_replace('$','M',str_replace('/','C',bcrypt($request->verifikasi->getClientOriginalName()).'.png'));
        $request->verifikasi->move('img/', $namafoto);
        $data = Pemesanan::where('id_pemesanan',$id_pemesanan)->first();
        // echo Auth;
        $pemesanan = Pemesanan::where(['id_rute'=>$data->id_rute,'tgl_berangkat'=>$data->tgl_berangkat])->sum('penumpang');
        // echo $namafoto.'<br>'.$namafoto;
        Pemesanan::find($data->id_pemesanan)->update([
            'status'=>'2',
            'verifikasi'=>$namafoto
        ]);
        return redirect('/detaildata/'.$data->id_pemesanan)->with('pembayaran','Pembayaran Telah Berhasil');
    }
    public function simpandata(Request $request)
    {
    	$data = [['titel'=>$request->titel1,'nama'=>$request->nama1,'mail'=>$request->mail1,'notelp'=>$request->notelp1]];
    	if($request->isMethod('GET')) {
            return redirect('/detailpenumpang');
        }
        else {
        	if (Cookie::get('pending')['penumpang']==1) {
        		$data[] = ['titel'=>$request->titel2,'nama'=>$request->nama2,'nopeng'=>$request->nopeng1];
        	}
        	else if (Cookie::get('pending')['penumpang']==2) {
        		$data[] = ['titel'=>$request->titel2,'nama'=>$request->nama2,'nopeng'=>$request->nopeng1];
    			$data[] = ['titel'=>$request->titel3,'nama'=>$request->nama3,'nopeng'=>$request->nopeng2];
        	}
        	else if (Cookie::get('pending')['penumpang']==3) {
    			$data[] = ['titel'=>$request->titel2,'nama'=>$request->nama2,'nopeng'=>$request->nopeng1];
    			$data[] = ['titel'=>$request->titel3,'nama'=>$request->nama3,'nopeng'=>$request->nopeng2];
    			$data[] = ['titel'=>$request->titel4,'nama'=>$request->nama4,'nopeng'=>$request->nopeng3];
        	}else{
    			$data[] = ['titel'=>$request->titel2,'nama'=>$request->nama2,'nopeng'=>$request->nopeng1];
    			$data[] = ['titel'=>$request->titel3,'nama'=>$request->nama3,'nopeng'=>$request->nopeng2];
    			$data[] = ['titel'=>$request->titel4,'nama'=>$request->nama4,'nopeng'=>$request->nopeng3];
    			$data[] = ['titel'=>$request->titel5,'nama'=>$request->nama5,'nopeng'=>$request->nopeng4];
        	}
        	$json = json_encode($data);
        	// return view('check',['data'=>$json]);
        	$cookie = Cookie::get('pending');
        	$cookie['data_penumpang'] = $json;
        	Pemesanan::create($cookie);
        	$ambilid = Pemesanan::where('kode_pemesanan',$cookie['kode_pemesanan'])->first();
        	// dump($cookie);
        	return redirect('/bayartiket/'.$ambilid->id_pemesanan);
        }
    }
}
