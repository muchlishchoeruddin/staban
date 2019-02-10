@extends('../layouts.app');
@section('content')
 <div class="container">
 	<div style="background-color: white;padding: 40px;margin:10px;">
 		<form action="{{url('/simpandata')}}" method="post">
 			{{csrf_field()}}
	 		<h4>Informasi Kontak yang dapat dihubungi</h4>
	 		<hr>
	 		<div class="row">
	 			<div class="col-md-6">
	 				<label for="title1">Title</label>
			 		<select class="form-control" id="title1" name="titel1">
			 			<option>Tuan</option>
			 			<option>Nyonya</option>
			 			<option>Nona</option>
			 		</select>
	 			</div>
	 			<div class="col-md-6">
	 				<label for="nama1">Nama Lengkap</label>
	 				<input type="text" class="form-control" name="nama1" id="nama1" required>
	 			</div>
	 		</div><br>
	 		<div class="row">
	 			<div class="col-md-6">
	 				<label for="mail1">Kontak Email</label>
	 				<input type="email" name="mail1" id="mail1" class="form-control">
	 			</div>
	 			<div class="col-md-6">
	 				<label for="notelp1">No. Telepon</label>
	 				<input type="number" name="notelp1" id="notelp1" class="form-control">
	 			</div>
	 		</div>
	 		<div class="row">
	 			<div class="col-md-12">
	 				<br>
	 				@if(Auth::check())
	 				<input type="checkbox" name="ambildatauser" id="mycheckbox" style="cursor: pointer;"> &nbsp; <label for="mycheckbox" style="cursor: pointer;">Ambil data dari akun anda</label>
	 				@endif
	 				<br>
	 				<small style="color:red;">*Catatan : Tolong data diisi dengan benar. Karena kami akan sangat mengandalkan informasi ini</small>
	 			</div>
	 		</div>

	 		<div class="penumpang">
	 			@for($i=1;$i<=$data['penumpang'];$i++)
		 			<br>
		 			<br>
		 			<h4>Penumpang {{$i}}</h4>
			 		<hr>
			 		<div class="row">
			 			<div class="col-md-6">
			 				<label for="title{{$i+1}}">Title</label>
					 		<select class="form-control" id="title{{$i+1}}" name="titel{{$i+1}}">
					 			<option>Tuan</option>
					 			<option>Nyonya</option>
					 			<option>Nona</option>
					 		</select>
			 			</div>
			 			<div class="col-md-6">
			 				<label for="nama{{$i+1}}">Nama Lengkap</label>
			 				<input type="text" class="form-control" name="nama{{$i+1}}" id="nama{{$i+1}}" required>
			 			</div>
			 		</div><br>
			 		<div class="row">
			 			<div class="col-md-12">
			 				<label for="nopeng{{$i}}">Nomor KTP / SIM</label>
			 				<input type="number" name="nopeng{{$i}}" id="nopeng{{$i}}" class="form-control">
			 				<small>Untuk Penumpang dibawah 17 tahun, wajib diisi dengan tanggal lahir, format ddmmyyyy. Contoh:17071999</small>
			 			</div>
			 		</div>
			 	@endfor
	 		</div><br><br>
	 		<div class="row">
	 			<div class="col-md-12">
	 				<input type="submit" name="kirim" value="PESAN SEKARANG" class="btn btn-success form-control" onclick="return confirm('Apakah kamu yakin data yang telah kamu masukan sudah benar? yuk di cek :)')">
	 			</div>
	 		</div>
 		</form>
 	</div>
 </div>
 <div style="display: none" class="url">{{url('/')}}</div>
@endsection
@section('js')
	<script type="text/javascript">
		$('input[name=ambildatauser]').change(function(){
			if ($(this).is(':checked')) {
				$.ajax({
					url:$('.url').text()+'/getdatauser',
					method:'get',
					success: function(response){
						$('#nama1').val(response.name);
						$('#mail1').val(response.email);
						$('#notelp1').val(response.notelp);
						// alert(response);
					}
				});
				// alert($('.url').text()+'/getdatauser');
			}else{
				$('#nama1').val('');
				$('#mail1').val('');
				$('#notelp1').val('');
			}
		});
	</script>
@endsection