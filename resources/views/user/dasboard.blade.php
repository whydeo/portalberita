@extends('template.user')
@section('isi')
<b class="label label-info"><b>BERITA TERBARU</b></b>
<hr>
<div class="row">
@foreach ($semua as $s)
	<div class="col-md-3">
		<a href="{{route('user.show_news',$s->id)}}" style="color: black;text-decoration: none;">
			<div class="panel panel-default">
			  <div class="panel-body">
			  	<img style="width: 250px;height: 200px" class="img-rounded img-responsive" src="{{asset('foto/'.$s->foto)}}">
			  	<h4>{{$s->judul}}</h4>
			  	<p><b>{{$s->author}} {{$s->tanggal}} </b></p>
			  	<p>{{substr($s->isi,0,100)}}</p>
			  </div>
			</div>
		</a>
	</div>
@endforeach
</div>
<div class="row">
	<div class="col-md-8">
		<b class="label label-info"><b>ARTIS</b></b>
		<hr>
		<div class="panel">
			<div class="panel">
				<!-- ARTIS -->
					<br>
				@foreach ($ARTIS as $artis)
					<div class="row">
						<a href="{{route('user.show_news',$artis->id)}}" style="color:black">
							<div class="col-md-3">
								<img style="width: 100px;height: 100px;margin: 25px" class="img-rounded img-responsive" src="{{asset('foto/'.$artis->foto)}}">
							</div>
							<div class="col-md-9">
								<h4>{{$artis->judul}}</h4>
							  	<p><b>{{$artis->author}} {{$artis->tanggal}} </b></p>
							  	<p>{{substr($s->isi,0,100)}}</p>
							</div>
						</a>
					</div>
				@endforeach
			</div>
			<!-- FILM -->
			<br>
			<b class="label label-info"><b>FILM</b></b>
			<hr>
			@foreach($FILM as $o)
				<div class="row">
					<a href="{{route('user.show_news',$o->id)}}" style="color: black">
						<div class="col-md-3">
							<img style="width: 100px;height: 100px;margin: 25px" class="img-rounded img-responsive" src="{{asset('foto/admin.png')}}">
						</div>
						<div class="col-md-9">
							<h4>{{$o->judul}}</h4>
						  	<p><b>{{$o->author}} {{$o->tanggal}}</b></p>
						  	<p>{{substr($o->isi,0,100)}}</p>
						</div>
					</a>
				</div>
			@endforeach
			<!-- MUSIK -->
			<br>
			<b class="label label-info"><b>MUSIK</b></b>
			<hr>
			@foreach($MUSIK as $p)
			<div class="row">
				<a href="{{route('user.show_news',$p->id)}}" style="color: black">
					<div class="col-md-3">
						<img style="width: 100px;height: 100px;margin: 25px" class="img-rounded img-responsive" src="{{asset('foto/'.$p->foto)}}">
					</div>
					<div class="col-md-9">
						<h4>{{$p->judul}}</h4>
						 <p><b>{{$p->author}} {{$p->tanggal}}</b></p>
						 <p>{{substr($p->isi,0,100)}}</p>
					</div>
				</a>
			</div>
			@endforeach
			<!-- TRENDING -->
			<br>
			<b class="label label-info"><b>TRENDING</b></b>
			<hr>
			@foreach($TRENDING as $tren)
			<div class="row">
				<a href="{{route('user.show_news',$tren->id)}}" style="color: black">
					<div class="col-md-3">
						<img style="width: 100px;height: 100px;margin: 25px" class="img-rounded img-responsive" src="{{asset('foto/'.$tren->foto)}}">
					</div>
					<div class="col-md-9">
						<h4>{{$tren->judul}}</h4>
						 <p><b>{{$tren->author}} {{$tren->tanggal}}</b></p>
						 <p>{{substr($tren->isi,0,100)}}</p>
					</div>
				</a>
			</div>
			@endforeach

		</div>
	</div>
	<div class="col-md-4">
		<!-- new news -->
		<b class="label label-info"><b>TOP NEWS</b></b>
		<hr>
		<div class="row">
		@foreach($tops as $tp)
			<a href="{{route('user.show_news',$tp->id)}}" style="color: black">
				<div class="col-md-6">
					<div class="panel panel-default">
					  <div class="panel-body">
					  	<img style="width: 100%;height: 100px" class="img-rounded img-responsive" src="{{asset('foto/'.$tp->foto)}}"><br>
					  	<p><b>{{substr($tp->judul,0,20)}}</b></p>
					  </div>
					</div>
				</div>
			</a>
			@endforeach
		</div>
		
	</div>
</div>
@endsection