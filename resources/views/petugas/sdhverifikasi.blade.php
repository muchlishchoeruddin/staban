@extends('../layouts.petugas')
@section('content')
	<div class="card">
	    <div class="card-header">
	        <h4 id="basic-forms" class="card-title">Data Pengguna</h4>
	        <div class="heading-elements">
	            <ul class="list-inline mb-0">
	                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	            </ul>
	        </div>
	    </div>
	    <div class="card-content" aria-expanded="true">
	        <div class="card-body">
				<div class="container">
					@if(\Session::has('success'))
						<div class="alert alert-success">{{Session::get('success')}}</div>
					@endif
					<table id="myTable">
						<thead>
							<tr>
								<th>No.</th>
								<th>Kode Pemesanan</th>
								<th>Tanggal Pemesanan</th>
								<th>Nama Pemesan</th>
								<th>Kode Kursi</th>
								<th>Tujuan</th>
								<th>Bukti Pembayaran</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $i=>$pemesanan)
							<tr>
								<td>{{$i+1}}</td>
								<td>{{$pemesanan->kode_pemesanan}}</td>
								<td>{{$pemesanan->tgl_pemesanan}}</td>
								<td>{{$pemesanan->user->name}}</td>
								<td>{{$pemesanan->kode_kursi}}</td>
								<td>{{$pemesanan->tujuan}}</td>
								<td><img src="{{url('/img/'.$pemesanan->verifikasi)}}" width="100px"></td>
								<td><button href="#" class="btn disabled verifikasi" disabled>Terverifikasi</button></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script type="text/javascript">
		$('#myTable').DataTable();
	</script>
@endsection