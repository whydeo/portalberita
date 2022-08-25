<!DOCTYPE html>
<html>
<head>
	<title>WEBTVASIA</title>
	 <link href=" {{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="all">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{route('user.show')}}">WEBTVASIA</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{route('user.show')}}">HOME</a></li>
      <li><a href="{{route('user.list_news',2)}}">ARTIS</a></li>
      <li><a href="{{route('user.list_news',3)}}">FILM</a></li>
      <!-- <li class="dropdown">
      	<a href="#" data-toggle="dropdown" class="dropdown-toggle">
      		FILM <span class="caret"></span>
      	</a>
      	<ul class="dropdown-menu">
      		<li><a href="{{route('user.list_news',5)}}">KOREA</a></li>
      		<li><a href="{{route('user.list_news',8)}}">HOLYWOOD</a></li>
      		<li><a href="{{route('user.list_news',9)}}">BOLYWOOD</a></li>
      		<li><a href="{{route('user.list_news',10)}}">INDONESIA</a></li>
      	</ul>
      </li> -->
      <li><a href="{{route('user.list_news',4)}}">MUSIK</a></li>
      <li><a href="{{route('user.list_news',5)}}">TRENDING</a></li>
      <!-- <li><a href="{{route('user.list_news',11)}}">FOTO</a></li> -->
    </ul>
    <ul class="nav navbar-nav navbar-right">
    	<li>
    		 <form class="form-inline" style="margin-top: 5px" action="{{route('user.cr_berita')}}" method="post">
    		 	{{csrf_field()}}
			    <input class="form-control mr-sm-2" name="cari" type="search" placeholder="Search" aria-label="Search">
			  </form>
    	</li>
    	<li><a href="{{route('user')}}">login</a></li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top: 80px">
	@yield('isi')
</div>

<nav class="navbar navbar-inverse navbar-button" style="margin-bottom: 0px;margin-top: 50px;color: white">
	<div class="container">
		<div class="row" style="margin-top: 40px;margin-bottom: 40px">
			<div class="col-md-4">
				<p class="text-center"><b>ABOUT WEBTVASIA NEWS</b></p>
				<p>{{$about->tentang}}</p>
			</div>
			<div class="col-md-4">
				<p class="text-center"><b>KONTAK WEBTVASIA NEWS</b></p>
				<ul>
					<li>Whatsapp : {{$about->kontak}}</li>
					<li>Phone : {{$about->kontak}}</li>
					<li>Email : {{$about->email}}</li>
					<li>Alamat : {{$about->alamat}}</li>
				</ul>
			</div>
			<div class="col-md-4">
				<p class="text-center"><b>KATEGORI WEBTVASIA NEWS</b></p>
				<ul>
					<li>FILM</li>
					<li>MUSIK</li>
					<li>TRENDING</li>
					<li>FOTO</li>
				</ul>
			</div>
		</div>
		<p class="text-center"><b>CREATED WEBTVASIA IT CORP </b></p>
	</div> 
</nav>
<script src="{{asset('vendor/jquery-3.2.1.min.js')}} "></script>
 <script src="{{asset('vendor/bootstrap-4.1/popper.min.js')}} "></script>
 <script src="{{asset('vendor/bootstrap-4.1/bootstrap.min.js')}} "></script>
</body>
</html>