<!DOCTYPE html>
<html lang="en">
<head>
    <title>Masuk</title>
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
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetlogin/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url({{asset('assetlogin/images/bg-01.jpg')}});">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <span class="login100-form-logo">
                        <i class="flaticon-around" style="color:#00afff"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27" style="color:#FFDD00">
                        Log in
                    </span>

                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    <div class="wrap-input100 validate-input" data-validate = "Masukan username">
                        <input class="input100" type="text" name="username" placeholder="Username" value="{{old('username')}}">
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                        @if ($errors->has('password'))
                            <span class="help-block" style="color:#ff0000">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    <div class="wrap-input100 validate-input" data-validate="Masukan password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>

                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Masuk
                        </button>
                    </div>

                    <div class="text-center p-t-30">
                        <a class="txt1" style="color:#ffdd00" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a> <span class="txt1">atau</span>
                        <a class="txt1" style="color:#ffdd00" href="{{ route('register') }}">
                            Registrasi
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
    <script src="{{asset('assetlogin/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('assetlogin/js/main.js')}}"></script>

</body>
</html>