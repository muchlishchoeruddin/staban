@extends('../layouts.app')
@section('content')
<center>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<center>
				<h1 style="margin-bottom: 0px">Metode Pembayaran</h1>
				<small>Silahkan bayar ke market terdekat dengan no hp penerima 08881111xxxx.</small>
				<div class="panel panel-primary" style="margin-top:20px; padding:10px;"><h3 style="margin:0px">sertakan kode pengambilan dan tunggu hingga proses verifikasi selesai</h3></div>
				</center>
			</div>	
		</div>
		<div class="row">
		 	<div class="col-md-12">
		 		<form action="/uploadbukti/{{$data['id_pemesanan']}}" method="post" id="form" enctype="multipart/form-data">
		 			{{csrf_field()}}
		 			<input type="file" name="verifikasi" id="input-id">
		 			<input type="submit" name="kirim" style="display:none">
		 		</form>
		 	</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{asset('inputfiles/js/plugins/sortable.js')}}/js/plugins/sortable.js" type="text/javascript"></script>
    {{-- <script src="{{asset('inputfiles/')}}" type="text/javascript"></script> --}}
    <script src="{{asset('inputfiles/js/locales/fr.js')}}" type="text/javascript"></script>
    <script src="{{asset('inputfiles/js/locales/es.js')}}" type="text/javascript"></script>
    <script src="{{asset('inputfiles/themes/fas/theme.js')}}" type="text/javascript"></script>
    <script src="{{asset('inputfiles/themes/explorer-fas/theme.js')}}" type="text/javascript"></script>

	<script type="text/javascript">
		$("#input-id").fileinput();
		// $(".upimage").click(function(){
		// 	$('input[name=kirim]').click();
		// });
		
		// with plugin options
		$("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});
	</script>
@endsection