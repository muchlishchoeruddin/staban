@extends('../layouts.app')
@section('content')
		@php
		// $bcrypt = bcrypt('asd');
		// $data = str_replace('$','M',$bcrypt);
		// echo $data;

		// $data = "['nama'=>'irfan','usia'=>'17']|Muchlish|Eri|Dadi";
		// $data = "{nama:'irfan', usia: 17}";

		// $data = json_decode($data);
		// $penumpang = explode('|',$data);
		// $data1 = $penumpang[0];
		// echo $data;
		// print_r($data1['nama']);

		@endphp
		{{-- {{App\Notifikasi::first()->pemesanan->tujuan}} --}}

		<div class="json" style="display: none">{{$data}}</div>
		{{-- {{$data}} --}}
		<div class="data">
			
		</div>
@endsection
@section('js')
	<script type="text/javascript">
			var myJSON = $('.json').text();
			var myObj = JSON.parse(myJSON);
			var data = '';
			// datas.append("asd")
			myObj.forEach(function(d,i){
				if (i==0) {
					data+=	"<div style='background-color:white;padding:10px;margin:10px;'>Kontak Yang dapat dihubungi <br>"+
							"Nama : "+d.nama+"<br>"+
							"Titel: "+d.titel+"<br>"+
							"Email "+d.mail+"</div>";
							"No. Telp. "+d.notelp+"</div>";
				}else{
					data+=	"<div style='background-color:white;padding:10px;margin:10px;'>Penumpang "+(i)+"<br>"+
							"Nama : "+d.nama+"<br>"+
							"Titel: "+d.titel+"<br>"+
							"No KTP / SIM "+d.nopengenal+"</div>";
				}
			});
			$('.data').html(data);
	</script>
@endsection