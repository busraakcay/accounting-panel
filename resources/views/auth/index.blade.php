<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Boltat Muhasebe | Giriş Yap</title>
	<meta name="description" content="Login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/css/pages/login/classic/login-3.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/css/style.bundle.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/base/light.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/css/themes/layout/header/menu/light.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/css/themes/layout/brand/dark.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/css/themes/layout/aside/dark.css?v=7.2.8')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/plugins/custom/fullcalendar/fullcalendar.bundle15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/plugins/global/plugins.bundle15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/plugins/custom/prismjs/prismjs.bundle15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/css/style.bundle15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/css/bootstrap-toggle.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/css/themes/layout/header/base/light15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/css/themes/layout/header/menu/light15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/css/themes/layout/brand/dark15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/css/themes/layout/aside/dark15aa.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/css/style.css') }}" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/panel/logo.png') }}">
	@include('partials.alert')


</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

	<div class="d-flex flex-column flex-root">
		<div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
			<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url({{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/media/bg/bg-2.jpg')}});">
				<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
					<div class="d-flex flex-center mb-15">
						<a>
							<img src="{{ asset('assets/panel/logo.png') }}" class="img-fluid" alt="" />
						</a>
					</div>
					<div class="login-signin">
						<div class="mb-20">
							<h3>Boltat Yönetim Paneli</h3>
							<p class="opacity-60 font-weight-bold"><a href="#" target="_blank" class="text-white">Boltat</a> Muhasebe Sistemi</p>
						</div>
						<form class="form" method="post" action="{{route('signin')}}">
							@csrf
							@method('post')
							<div class="form-group">
								<input class="form-control h-auto text-dark placeholder-dark opacity-70 rounded-pill border-0 bg-light py-4 px-8 mb-5" type="text" placeholder="Kullanıcı Adı" name="username" autocomplete="off" />
							</div>
							<div class="form-group">
								<input class="form-control h-auto text-dark placeholder-dark opacity-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Şifre" name="password" />
							</div>
							<div class="form-group text-center mt-10">
								<button id="kt_login_signin_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Giriş Yap</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/plugins/global/plugins.bundle.js?v=7.2.8')}}"></script>
	<script src="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.2.8')}}"></script>
	<script src="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/js/scripts.bundle.js?v=7.2.8')}}"></script>
	<script src="{{asset('assets/panel/metronic/metronic/theme/html/demo1/dist/assets/js/pages/custom/login/login-general.js?v=7.2.8')}}"></script>
	<script src="{{ asset('assets/sweetalert/sweetalert2.all.min.js') }}"></script>





</body>

</html>