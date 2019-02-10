<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('assetlogin/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/vendor/bootstrap/css/bootstrap.min.cs')}}s">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/fonts/iconic/css/material-design-iconic-font.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/vendor/animate/animate.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" href="{{asset('tour/fonts/flaticon/font/flaticon.css')}}">
<!--===============================================================================================-->
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('tour/css/bootstrap-datepicker.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/css/main.css')}}">
<!--===============================================================================================-->

    <!-- Modernizr JS -->
    <script src="{{asset('tour/js/modernizr-2.6.2.min.js')}}"></script>
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{asset('assetlogin/images/bg-01.jpg')}});">
            <div class="wrap-login100" style="width:750px;">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_level" value="3">
                    <span class="login100-form-logo">
                        <i class="fa fa-file-text-o" style="color:#00afff"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27" style="color:#FFDD00">
                        Register
                    </span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Masukan Username">
                                <input class="input100" type="text" name="username" placeholder="Username" value="{{old('username')}}">
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>    
                        </div>

                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate="Masukan Password">
                                <input class="input100" type="password" name="password" placeholder="Password">
                                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-input100 validate-input" data-validate="Masukan Konfirmasi Password">
                                <input class="input100" type="password" name="password_confirmation" placeholder="Konfirmasi Password">
                                <span class="focus-input100" data-placeholder="&#xf191;"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Masukan Email">
                                <input class="input100" type="email" name="email" placeholder="contoh@contoh.com" value="{{old('email')}}">
                                <span class="focus-input100" data-placeholder="&#64;"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>    
                        </div>

                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Masukan Nama">
                                <input class="input100" type="text" name="nama" placeholder="Nama" value="{{old('nama')}}">
                                <span class="focus-input100" data-placeholder="&#xf207;"></span>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>    
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="wrap-input100 validate-input" data-validate = "Masukan Alamat">
                                <input class="input100" type="text" name="alamat" placeholder="Alamat" value="{{old('alamat')}}">
                                <span class="focus-input100" data-placeholder="&#xf133;"></span>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Masukan Tanggal Lahir">
                                <input class="input100" id="date" type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')}}">
                                <span class="focus-input100" data-placeholder="&#xf122;"></span>
                                @if ($errors->has('tanggal_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="wrap-input100 validate-input" data-validate = "Pilih Jenis Kelamin">
                                <select class="input100" style="border:none;outline: none" name="jenis_kelamin">
                                    <option style="color:black" value="L" {{ old('jenis_kelamin')=='L' ? 'selected' : '' }}>Laki - laki</option>
                                    <option style="color:black" value="P" {{ old('jenis_kelamin')=='P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                <span class="focus-input100" data-placeholder="&#xf21d;"></span>
                            </div>  
                        </div>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            Ingatkan Saya
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Daftarkan
                        </button>
                    </div>

                    <div class="text-center p-t-30">
                        <a class="txt1" style="color:#ffdd00" href="{{ route('login') }}">
                            Punya Akun?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('assetlogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assetlogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->

    <!-- Date Picker -->
    <script src="{{asset('tour/js/bootstrap-datepicker.js')}}"></script>
<!--===============================================================================================-->

    <script src="{{asset('tour/js/main.js')}}"></script>
<!--===============================================================================================-->

    <script src="{{asset('tour/js/magnific-popup-options.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('bootstrap-select-1.13.2/dist/js/bootstrap-select.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.date').datepicker({
                inline:true
            });
            $('.selectpicker').selectpicker();
        })
    </script>

</body>
</html>