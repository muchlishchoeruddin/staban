<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tour Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{csrf_token()}}" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
    
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/asset/minilogo.png')}}">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('select2/dist/css/select2.css')}}">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('tour/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('tour/css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('tour/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('tour/css/magnific-popup.css')}}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{asset('tour/css/flexslider.css')}}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('tour/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('tour/css/owl.theme.default.min.css')}}">
    
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('tour/css/bootstrap-datepicker.css')}}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{asset('tour/fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('tour/css/style.css')}}">

    <!-- Modernizr JS -->
    <script src="{{asset('tour/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    </head>
    <body>
        
    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-2">
                            <div id="colorlib-logo"><a href="{{url('/')}}"><img src="{{asset('img/asset/logo2.png')}}" style="width:140px;"></a></div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li class="active"><a href="index.html">Beranda</a></li>
                                <li><a href="services.html">Jasa</a></li>
                                <li><a href="about.html">Tentang Kami</a></li>
                                <li><a href="contact.html">Kontak</a></li>
                                @if(Auth::check())
                                    <span style="color: white">- Hi !</span> @if(Auth::user()->id_level==3)
                                        <li class="has-dropdown">
                                            <a href="#">{{Auth::user()->name}}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{url('/transaksi')}}"><i class="fa fa-retweet"> </i> &nbsp; Transaksi</a></li>
                                                <li><a href="{{url('/tracking')}}"><i class="fa fa-money"> </i> &nbsp; Tracking</a></li>
                                                <li><a href="{{url('/notifikasi')}}"><i class="fa fa-bell"> </i> &nbsp; Notifikasi</a></li>
                                                @if(count(App\Notifikasi::where(['id_user'=>Auth::id(),'status'=>1])->get())>0)
                                                    <span class="" style="position: absolute;margin-top:-26px;margin-left:5px; background-color: #a00; border-radius: 100%;width:10px;height:10px;font-size: 6px;color:white;text-align: center;">
                                                    @if(strlen(count(App\Notifikasi::where(['id_user'=>Auth::id(),'status'=>1])->get()))>1)
                                                    @else
                                                        {{count(App\Notifikasi::where(['id_user'=>Auth::id(),'status'=>1])->get())}}
                                                    @endif
                                                    </span>
                                                @endif
                                                <li><hr></li>
                                                <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-power-off"></i> Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form></li>
                                            </ul>
                                        </li>
                                    @elseif(Auth::user()->id_level==2)
                                        <li class="has-dropdown">
                                            <a href="#">{{Auth::user()->name}}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{url('/petugas/dashboard')}}"><i class="fa fa-dashboard"> </i> Dashboard</a></li>
                                                <li><hr></li>
                                                <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-power-off"></i> Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="has-dropdown">
                                            <a href="#">{{Auth::user()->name}}</a>
                                            <ul class="dropdown">
                                                <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                                                <li><hr></li>
                                                <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-power-off"></i> Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form></li>
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    <li><a href="{{route('login')}}">Login</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <aside id="colorlib-hero">
            <div class="flexslider">
                <ul class="slides">
                <li style="background-image: url({{asset('tour/images/img_bg_1.jpg')}});">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-14 col-xs-14 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Wisata 2 Hari</h2>
                                    <h1>Wisata Bali Luar Biasa</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url({{asset('tour/images/img_bg_5.jpg')}});">
                    <div class="overlay"></div>
                    <div class="container-fluids">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Jelajahi agensi tavel kami</h2>
                                    <h1>Agensi travel kami</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url({{asset('tour/images/img_bg_4.jpg')}});">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner text-center">
                                    <h2>Mengalami</h2>
                                    <h1>Perjalanan Terbaik</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>       
                </ul>
            </div>
        </aside>
        <div id="colorlib-reservation">
            <!-- <div class="container"> -->
                <div class="row">
                    <div class="search-wrap">
                        <div class="container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#flight"><i class="flaticon-plane"></i> Penerbangan</a></li>
                                <li><a data-toggle="tab" href="#train"><i class="flaticon-sign"></i> Kereta</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="flight" class="tab-pane fade in active">
                                @php
                                    $darip = App\Rute::whereHas('transportasi',function($transportasi){
                                        $transportasi->where('id_tt',2);
                                    })->groupBy('dari')->get();
                                @endphp
                                <div class="tab-content">
                                    <div class="tab-pane fade in active">
                                        <div class="colorlib-form">
                                            <input type="hidden" name="id_tt1" value="2" >
                                            <div class="row">
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                <label for="date">Dari:</label>
                                                <div class="form-field">
                                                  <select multiple name="dari1" id="location" class="form-control" required style="width:100%;">
                                                        @foreach($darip as $pesawat)
                                                            <option>{{$pesawat->dari}}</option>
                                                        @endforeach
                                                  </select>
                                                </div>
                                              </div>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                <label for="date">Ke:</label>
                                                <div class="form-field">
                                                  <select multiple name="ke1" id="location" class="form-control" disabled required style="width:100%;">
                                                        
                                                  </select>
                                                </div>
                                              </div>
                                             </div>
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="date">Pergi:</label>
                                                <div class="form-field">
                                                  <i class="icon icon-calendar2"></i>
                                                  <input type="text" id="date" name="tgl_berangkat1" class="form-control date" placeholder="Tanggal Pergi" required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="guests">Penumpang</label>
                                                <div class="form-field">
                                                  <i class="icon icon-arrow-down3"></i>
                                                  <select name="penumpang1" id="people" class="form-control">
                                                    <option style="color:black">1</option>
                                                    <option style="color:black">2</option>
                                                    <option style="color:black">3</option>
                                                    <option style="color:black">4</option>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-2">
                                              <input type="submit" name="submit" id="submit" value="Temukan Penerbangan" class="btn btn-primary btn-block" onclick="wL1($('select[name=dari1]').val(),$('select[name=ke1]').val(),$('input[name=tgl_berangkat1]').val(),$('select[name=penumpang1]').val(),$('input[name=id_tt1]').val())">
                                            </div>
                                          </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                            <div id="train" class="tab-pane fade">
                                @php
                                    $darik = App\Rute::whereHas('transportasi',function($transportasi){
                                        $transportasi->where('id_tt',1);
                                    })->groupBy('dari')->get();
                                @endphp
                                <div class="tab-content">
                                    <div class="tab-pane fade in active">
                                        <div class="colorlib-form">
                                            <input type="hidden" name="id_tt2" value="1">
                                            <div class="row">
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                <label for="date">Dari:</label>
                                                <div class="form-field">
                                                  <select multiple name="dari2" id="location" class="form-control" required style="width:100%;"">
                                                        @foreach($darik as $kereta)
                                                            <option>{{$kereta->dari}}</option>
                                                        @endforeach
                                                  </select>
                                                </div>
                                              </div>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="form-group">
                                                <label for="date">Ke:</label>
                                                <div class="form-field">
                                                  <select multiple name="ke2" id="location" class="form-control" style="width:100%;" disabled required>
                                                        
                                                  </select>
                                                </div>
                                              </div>
                                             </div>
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="date">Pergi:</label>
                                                <div class="form-field">
                                                  <i class="icon icon-calendar2"></i>
                                                  <input type="text" id="date" name="tgl_berangkat2" class="form-control date" placeholder="Tanggal Pergi" required>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-2">
                                              <div class="form-group">
                                                <label for="guests">Penumpang</label>
                                                <div class="form-field">
                                                  <i class="icon icon-arrow-down3"></i>
                                                  <select name="penumpang2" id="people" class="form-control">
                                                    <option style="color:black">1</option>
                                                    <option style="color:black">2</option>
                                                    <option style="color:black">3</option>
                                                    <option style="color:black">4</option>
                                                  </select>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-2">
                                              <input type="submit" name="submit" id="submit" value="Temukan Kereta" class="btn btn-primary btn-block" onclick="wL2($('select[name=dari2]').val(),$('select[name=ke2]').val(),$('input[name=tgl_berangkat2]').val(),$('select[name=penumpang2]').val(),$('input[name=id_tt2]').val())">
                                            </div>
                                          </div>
                                        </div>
                                    </div>  
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

@yield('content')
    <div id="colorlib-subscribe" style="background-image: url({{asset('tour/images/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
                    <h2>Sign Up for a Newsletter</h2>
                    <p>Sign up for our mailing list to get latest updates and offers.</p>
                    <form class="form-inline qbstp-header-subscribe" onsubmit="notifikasi()">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-0">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" placeholder="Enter your email" required>
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<footer id="colorlib-footer" role="contentinfo">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                    <h4>Tour Agency</h4>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                    <p>
                        <ul class="colorlib-social-icons">
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>Book Now</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="#">Flight</a></li>
                            <li><a href="#">Hotels</a></li>
                            <li><a href="#">Tour</a></li>
                            <li><a href="#">Car Rent</a></li>
                            <li><a href="#">Beach &amp; Resorts</a></li>
                            <li><a href="#">Cruises</a></li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-2 colorlib-widget">
                    <h4>Top Deals</h4>
                    <p>
                        <ul class="colorlib-footer-links">
                            <li><a href="#">Edina Hotel</a></li>
                            <li><a href="#">Quality Suites</a></li>
                            <li><a href="#">The Hotel Zephyr</a></li>
                            <li><a href="#">Da Vinci Villa</a></li>
                            <li><a href="#">Hotel Epikk</a></li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-2">
                    <h4>Blog Post</h4>
                    <ul class="colorlib-footer-links">
                        <li><a href="#">The Ultimate Packing List For Female Travelers</a></li>
                        <li><a href="#">How These 5 People Found The Path to Their Dream Trip</a></li>
                        <li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>
                    </ul>
                </div>

                <div class="col-md-3 col-md-push-1">
                    <h4>Contact Information</h4>
                    <ul class="colorlib-footer-links">
                        <li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
                        <li><a href="tel://1234567920">+ 1235 2355 98</a></li>
                        <li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                        <li><a href="#">yoursite.com</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
                        <span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>
<div class="base-url" style="display: none;">{{url('/')}}</div>
<!-- jQuery -->
    <script src="{{asset('tour/js/jquery.min.js')}}"></script>
    <!-- jQuery Easing -->
    <script src="{{asset('tour/js/jquery.easing.1.3.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('tour/js/bootstrap.min.js')}}"></script>
    <!-- Waypoints -->
    <script src="{{asset('tour/js/jquery.waypoints.min.js')}}"></script>
    <!-- Flexslider -->
    <script src="{{asset('tour/js/jquery.flexslider-min.js')}}"></script>
    <!-- Owl carousel -->
    <script src="{{asset('tour/js/owl.carousel.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{asset('tour/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('tour/js/magnific-popup-options.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('tour/js/bootstrap-datepicker.js')}}"></script>
    <!-- Stellar Parallax -->
    <script src="{{asset('tour/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('select2/dist/js/select2.min.js')}}"></script>
    <!-- Main -->
    <script src="{{asset('tour/js/main.js')}}"></script>
    <script>
            $(document).ready(function() {
                  if (Notification.permission !== "granted")
                    Notification.requestPermission();
            });
             
            function notifikasi() {
                if (!Notification) {
                    alert('Browsermu tidak mendukung Web Notification.'); 
                    return;
                }
                if (Notification.permission !== "granted")
                    Notification.requestPermission();
                else {
                    var notifikasi = new Notification('Selamat Berlangganan', {
                        icon: 'http://jagocoding.com/theme/New/img/logo.png',
                        body: "Memesan Tiket di E-Tiket, Membuatmu lebih mudah bertransaksi",
                    });
                    notifikasi.onclick = function () {
                        window.open("http://goo.gl/dIf4s1");      
                    };
                    setTimeout(function(){
                        notifikasi.close();
                    }, 5000);
                }
            };
            $('select[name=dari1]').select2({maximumSelectionLength:1,placeholder:'Cari Lokasi'});
            $('select[name=ke1]').select2({maximumSelectionLength:1,placeholder:'Cari Lokasi'});
            $('select[name=dari2]').select2({maximumSelectionLength:1,placeholder:'Cari Lokasi'});
            $('select[name=ke2]').select2({maximumSelectionLength:1,placeholder:'Cari Lokasi'});
            // alert();
            $('select[name=dari1]').change(function(){
                // alert($('select[name=dari1]').val());
                if ($(this).val() == null) {
                    $('select[name=ke1]').attr('disabled','disabled');
                }else{
                    $('select[name=ke1]').removeAttr('disabled');
                }

                $.ajax({
                    url:$('.base-url').text()+'/getdatatujuan/'+$(this).val(),
                    method:'GET',
                    success:function(response){
                        var html = "";
                        response.forEach((d, i)=>{
                            html += "<option>" + d.tujuan + "</option>";             
                        });
                        console.log(html);
                        $('select[name=ke1]').html(
                                // response.forEach(function(data, i){
                                //     "<option>"+data.rute_akhir+"</option>"      
                                // })
                                // response

                                html
                            );

                        // console.log(response[1]['rute_akhir']);
                    }
                });
            });
            $('select[name=dari2]').change(function(){
                // alert($('select[name=dari1]').val());
                if ($(this).val() == null) {
                    $('select[name=ke2]').attr('disabled','disabled');
                }else{
                    $('select[name=ke2]').removeAttr('disabled');
                }

                $.ajax({
                    url:$('.base-url').text()+'/getdatatujuan/'+$(this).val(),
                    method:'GET',
                    success:function(response){
                        var html = "";
                        response.forEach((d, i)=>{
                            html += "<option>" + d.tujuan + "</option>";             
                        });
                        console.log(html);
                        $('select[name=ke2]').html(html);
                    }
                });
            });
            $(window).load(function(){
                if ($('select[name=dari2]').val() == null) {
                    $('select[name=ke2]').attr('disabled','disabled');
                }else{
                    $('select[name=ke2]').removeAttr('disabled');
                }
                // alert('asd');
                if ($('select[name=dari1]').val() == null) {
                    $('select[name=ke1]').attr('disabled','disabled');
                    // alert('name1 null')
                }else{
                    $('select[name=ke1]').removeAttr('disabled');
                    // alert('name1 not null')
                }
            });
            function wL1(dari,tujuan,tgl,penumpang,tt) {
                if ( dari == null || tujuan == undefined || tgl == '' || penumpang == '' || tt == '' ) {
                // alert($('.base-url').text()+'/tiket/'+dari+'/'+tujuan+'/'+tgl+'/'+penumpang+'/'+tt);
                    alert('Formulir harus diisi semua, untuk memudahkan pencarian');
                }else{
                    window.location=$('.base-url').text()+'/tiket/'+dari+'/'+tujuan+'/'+tgl+'/'+penumpang+'/'+tt;
                }
            }
            function wL2(dari,tujuan,tgl,penumpang,tt) {
                if ( dari == null || tujuan == undefined || tgl == '' || penumpang == '' || tt == '' ) {
                // alert($('.base-url').text()+'/tiket/'+dari+'/'+tujuan+'/'+tgl+'/'+penumpang+'/'+tt);
                    alert('Formulir harus diisi semua, untuk memudahkan pencarian');
                }else{
                    window.location=$('.base-url').text()+'/tiket/'+dari+'/'+tujuan+'/'+tgl+'/'+penumpang+'/'+tt;
                }
            }
        </script>
</body>
</html>