@extends('../layouts.maintemplate')
@section('content')
	<div class="container" style="margin-top: 10px;">
		<div class="row">
		<div class="col-md-12">
			@foreach($data as $i=>$rute)
				@php
					$pemesanan = \App\Pemesanan::where(['id_rute'=>$rute->id_rute,'tgl_berangkat'=>$request['tgl_berangkat']])->sum('penumpang');
				@endphp
				<div style="width:100%; background-color: #ddd; margin-top:30px;">
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
								<div class="col-md-12">
									Jam Berangkat : <span style="font-weight: bold">{{$rute->jam_berangkat}}</span>
								</div>
							</div><br>
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
							@if($pemesanan+$request['penumpang']>$rute->transportasi->jml_kursi)
								<div class="style">Kursi Sudah Penuh</div>
							@else<br>
							<div class="form-group">
								<form action="{{url('/detailpenumpang')}}" method="post">
									{{csrf_field()}}
									<input type="hidden" name="id_rute" value="{{$rute->id_rute}}">
									<input type="hidden" name="tujuan" value="{{$rute->rute_akhir}}">
									<input type="hidden" name="tgl_berangkat" value="{{$request['tgl_berangkat']}}">
									<input type="hidden" name="jam_berangkat" value="{{$rute->jam_berangkat}}">
									<input type="hidden" name="total_bayar" value="{{$rute->harga*$request['penumpang']}}">
									<input type="hidden" name="id_transportasi" value="{{$rute->id_transportasi}}">
									<input type="hidden" name="penumpang" value="{{$request['penumpang']}}">

									<input type="submit" style="margin-top:20px;" name="kirim" class="btn btn-success" value="Pesan Sekarang">
								</form>
							</div>
							@endif
						</div>	
					</div> 
				</div>
			@endforeach	
			<center>{{ $data->links() }}</center>
			<br>
			<br>
			<br>
		</div>
	</div>
	</div>
@endsection