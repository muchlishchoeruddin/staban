@extends('../layouts.app')
@section('content')
<div class="container">
	@if(count($data)>0)
		<small style="right:0;"><i class="fa fa-check-square-o"></i> &nbsp; Belum Dibaca</small>
		@foreach($data as $notif)
			<div class="nf" style="background-color: white;padding: 10px;margin:5px">{{$notif->message}}</div>
		@endforeach
	@endif

	@if(count($data2)>0)
		<small style="right:0;"><i class="fa fa-check-square"></i> &nbsp; Sudah Dibaca</small>
		@foreach($data2 as $notif)
			<div class="nf" style="background-color: white;padding: 10px;margin:5px">{{$notif->message}}</div>
		@endforeach
	@endif
</div>
@endsection