@extends('../layouts.app')
@section('style')
		<style type="text/css">
			.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
				background-color: white;
			}
		</style>
@endsection
@section('content')
	<div class="container">
		<ul class="nav nav-tabs">
			<li role="presentation" class="active menu">
				<a href="#">Semua</a>
			</li>	
			<li role="presentation" class="menu">
				<a href="#">Belum Diverifikasi</a>
			</li>	
			<li role="presentation" class="menu">
				<a href="#">Sudah Diverifikasi</a>
			</li>
		</ul>
		<div class="row" style="background-color: white;padding:30px;">
			<div class="all">
				<table class="myTable">
					<thead>	
						<tr>	
							<th>No.</th>
							<th>Kode Pemesanan</th>
							<th>Tanggal Pemesanan</th>
							<th>Penumpang</th>
							<th>Stasiun Pemberangkatan</th>
							<th>Tujuan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $i=>$semua)
						<tr>
							<th>{{$i+1}}</th>
							@if($semua->status==2)
							<td>-</td>
							@else
								<th>{{$semua->kode_pemesanan}}</th>
							@endif
							<th>{{$semua->tgl_pemesanan}}</th>
							<th>{{$semua->penumpang}}</th>
							<th>{{$semua->rute->rute_awal}}</th>
							<th>{{$semua->tujuan}}</th>
							<th>
								@if($semua->status==2)
									<b style="color:gray">Belum Diverifikasi</b>
								@else
									<b style="color:green">Sudah Diverifikasi</b>
								@endif
							</th>
							<th><a class="btn btn-primary" href="{{url('/detaildata/'.$semua->id_pemesanan)}}">Lihat Detail</a></th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="bdv">
				<table class="myTable">
					<thead>	
						<tr>	
							<th>No.</th>
							<th>Kode Pemesanan</th>
							<th>Tanggal Pemesanan</th>
							<th>Penumpang</th>
							<th>Stasiun Pemberangkatan</th>
							<th>Tujuan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data2 as $i=>$semua)
						<tr>
							<th>{{$i+1}}</th>
							@if($semua->status==2)
							<td>-</td>
							@else
								<th>{{$semua->kode_pemesanan}}</th>
							@endif
							<th>{{$semua->tgl_pemesanan}}</th>
							<th>{{$semua->penumpang}}</th>
							<th>{{$semua->rute->rute_awal}}</th>
							<th>{{$semua->tujuan}}</th>
							<th>
								@if($semua->status==2)
									<b style="color:gray">Belum Diverifikasi</b>
								@else
									<b style="color:green">Sudah Diverifikasi</b>
								@endif
							</th>
							<th><a class="btn btn-primary" href="{{url('/detaildata/'.$semua->id_pemesanan)}}">Lihat Detail</a></th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="sdv">
				<table class="myTable">
					<thead>	
						<tr>	
							<th>No.</th>
							<th>Kode Pemesanan</th>
							<th>Tanggal Pemesanan</th>
							<th>Penumpang</th>
							<th>Stasiun Pemberangkatan</th>
							<th>Tujuan</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data3 as $i=>$semua)
						<tr>
							<th>{{$i+1}}</th>
							@if($semua->status==2)
							<td>-</td>
							@else
								<th>{{$semua->kode_pemesanan}}</th>
							@endif
							<th>{{$semua->tgl_pemesanan}}</th>
							<th>{{$semua->penumpang}}</th>
							<th>{{$semua->rute->rute_awal}}</th>
							<th>{{$semua->tujuan}}</th>
							<th>
								@if($semua->status==2)
									<b style="color:gray">Belum Diverifikasi</b>
								@else
									<b style="color:green">Sudah Diverifikasi</b>
								@endif
							</th>
							<th><a class="btn btn-primary" href="{{url('/detaildata/'.$semua->id_pemesanan)}}">Lihat Detail</a></th>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('js')
		<script type="text/javascript">
			$('.myTable').DataTable();

			$('.all').show(200);
			$('.sdv').hide(200);
			$('.bdv').hide(200);
			$('.menu').eq(0).click(function() {
				$('.menu').eq(1).removeClass('active');
				$('.menu').eq(0).addClass('active');
				$('.menu').eq(2).removeClass('active');
				$('.all').show(200);
				$('.sdv').hide(200);
				$('.bdv').hide(200);
			});
			$('.menu').eq(1).click(function() {
				$('.menu').eq(0).removeClass('active');
				$('.menu').eq(1).addClass('active');
				$('.menu').eq(2).removeClass('active');
				$('.all').hide(200);
				$('.sdv').hide(200);
				$('.bdv').show(200);
			});
			$('.menu').eq(2).click(function() {
				$('.menu').eq(1).removeClass('active');
				$('.menu').eq(2).addClass('active');
				$('.menu').eq(0).removeClass('active');
				$('.all').hide(200);
				$('.sdv').show(200);
				$('.bdv').hide(200);
			});
		</script>
@endsection