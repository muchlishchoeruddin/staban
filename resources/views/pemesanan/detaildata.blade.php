@extends('../layouts.app')
@section('style')
	<style type="text/css">
		table tr td  {
			padding:10px;
		}
	</style>
@endsection
@section('content')
	<div class="container">
		<div class="row" style="background-color: white;">
			<div class="col-md-12"><center>
				<h1>Detail Data<h1>
				@if(\Session::has('pembayaran'))
						<div class="alert alert-success">
							<h4 style="margin-bottom:-12px;"> <i class="fa fa-check-circle"></i> Data Berhasil di ajukan</h4>
							<small style="font-size: 14px;">tunggu beberapa saat.. admin sedang melakukan pengecekan transaksi</small>
						</div>
				@endif
				<div class="row" style="font-size: 16px">
					<div class="col-md-6">
						<table style="width:100%;">
							<tr>
								<td>kode pemesanan</td>
								<td>:</td>
								<td>
									@if($data->status==2)
										-
									@else
										{{$data->kode_pemesanan}}
									@endif
								</td>
							</tr>
							<tr>
								<td>Tanggal Pemesanan</td>
								<td>:</td>
								<td>{{$data->tgl_pemesanan}}</td>
							</tr>
							<tr>
								<td>kode Kursi</td>
								<td>:</td>
								<td>{{$data->kode_kursi}}</td>
							</tr>
							<tr>
								<td>Rute Awal</td>
								<td>:</td>
								<td>{{$data->rute->rute_awal}}</td>
							</tr>
							<tr>
								<td>Harga Satuan</td>
								<td>:</td>
								<td>{{$data->rute->harga}}</td>
							</tr>
							<tr>
								<td>Total Harga</td>
								<td>:</td>
								<td>{{$data->total_bayar}}</td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table style="width:100%;">
							<tr>
								<td>Jam Checkin</td>
								<td>:</td>
								<td>{{$data->jam_checkin}}</td>
							</tr>
							<tr>
								<td>Jam Berangkat</td>
								<td>:</td>
								<td>{{$data->jam_berangkat}}</td>
							</tr>
							<tr>
								<td>Transportasi</td>
								<td>:</td>
								<td>{{$data->rute->transportasi->nama_transportasi}}</td>
							</tr>
							<tr>
								<td>Rute Akhir</td>
								<td>:</td>
								<td>{{$data->tujuan}}</td>
							</tr>
							<tr>
								<td>Penumpang</td>
								<td>:</td>
								<td>{{$data->penumpang}}</td>
							</tr>
							<tr>
								<td>Status</td>
								<td>:</td>
								<td>
									@if($data->status==2)
										<b style="color:gray">Belum diverifikasi</b>
									@elseif($data->status==3)
										<b style="color:blue">Sudah diverifikasi</b>
									@else
										<b style="color:green">Anda sudah menggunakan tiket ini</b>
									@endif
								</td>
							</tr>
						</table>
					</div>
				</div><br>
				<div class="col-2"><a href="{{url('/transaksi')}}" class="btn btn-success">Pergi Ke Transaksi Anda</a> <a class="btn btn-primary" href="{{url('/')}}">Beranda</a></div>
				</center>
			</div>
		</div>
	</div>
@endsection