@extends('../layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="background-color: white;border-radius:5px; padding:20px">
				@if(count($data)>0)
					@foreach($data as $i => $pending)
						<div style="width:100%; background-color: #ddd; margin-top:30px;">
							@php
								$rute = App\Rute::where('id_rute',$pending['id_rute'])->first();
								$pemesanan = \App\Pemesanan::where(['id_rute'=>$pending['id_rute'],'tgl_berangkat'=>$pending['tgl_berangkat']])->sum('penumpang');
							@endphp
							<div style="width:100%; padding:10px;background-color: #2C2E3E; color:white; font-weight: bold">
								{{$rute->transportasi->nama_transportasi}}
							</div>
								
							<div class="row" style="padding:10px;">
								<div class="col-md-8 text-left">
									<div class="row">
										<div class="col-md-6">
											Dari : {{$rute->dari}}<br>
											Stasiun {{$rute->rute_awal}}

										</div>
										<div class="col-md-6">
											Ke : {{$rute->tujuan}}<br>
											Stasiun {{$rute->rute_akhir}}
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											Jam Berangkat : <span style="font-weight: bold">{{$rute->jam_berangkat}}</span>
										</div>
										<div class="col-md-6">Penumpang : {{$pending->penumpang}}</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h1>IDR <span style="font-weight: bold">{{number_format($rute->harga)}}</span></h1>
										</div>
									</div>
								</div>
								<div class="col-md-4 text-right">
									<div style="padding-right:15px;">
										<h3>{{$pemesanan}}/{{$rute->transportasi->jml_kursi}}</h3>
									</div>
									@if($pemesanan>$rute->transportasi->jml_kursi)
										<div class="style">Kursi Sudah Penuh</div>
									@else
										<a href="/bayartiket/{{$pending->id_pemesanan}}" class="btn btn-success" style="width:100px;margin-top:30px"><i class="fa fa-money"></i> Bayar</a>
									@endif
								</div>	
							</div> 
						</div>
					@endforeach
				@else
					<center><h1>Anda belum pernah memesan tiket apapun</h1>
						<small>Jika pesanan belum dibayar hingga kurun waktu 3 jam, maka Pesanan dinyatakan hangus dan akan dihapus dari list</small>
					</center>
				@endif
			</div>
		</div>
	</div>
@endsection