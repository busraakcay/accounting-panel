<!DOCTYPE html>

<html lang="tr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8" />
	<title>Boltat Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
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

	<link href="{{ asset('assets/panel/plugins/custom/cropper/cropper.bundle15aa.css') }}" rel="stylesheet" />

	<script src="{{ asset('assets/panel/dropzone/dropzone.min.js') }}"></script>
	<link href="{{ asset('assets/panel/dropzone/basic.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/panel/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

	<script src="{{asset('assets/panel/js/jquery.min.js')}}"></script>
	@livewireStyles
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
	<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
		<a href="">
			<i class="menu-icon fab fa-cpanel fa-5x" aria-hidden="true"></i>
		</a>
		<div class="d-flex align-items-center">
			<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
				<span></span>
			</button>
			<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
				<span></span>
			</button>
			<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
				<span class="svg-icon svg-icon-xl">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24" />
							<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
							<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
						</g>
					</svg>
				</span>
			</button>
		</div>
	</div>
	<div class="d-flex flex-column flex-root">
		<div class="d-flex flex-row flex-column-fluid page">
			<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
				<div class="brand flex-column-auto" id="kt_brand">
					<a href="{{ route('dashboard') }}" class="brand-logo">
						<img src="{{ asset('assets/panel/logo.png') }}" class="img-fluid" alt="" />
					</a>
					<script type="text/javascript">
					</script>
					<button class="brand-toggle btn btn-sm px-0" onclick="logoClick()" id="kt_aside_toggle">
						<span class="svg-icon svg-icon svg-icon-xl">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24" />
									<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
									<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
								</g>
							</svg>
						</span>
					</button>
				</div>
				<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
					<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
						<ul class="menu-nav">
							<li class="menu-item {{ (request()->segment(1) == '') ? 'menu-item-active' : '' }}" aria-haspopup="true">
								<a href="{{ route('dashboard') }}" class="menu-link">
									<i class="menu-icon fas fa-tachometer-alt"></i>
									<span class="menu-text">Kontrol Paneli</span>
								</a>
							</li>

							<li class="menu-item {{ (request()->segment(1) == 'report') ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
								<a href="" class="menu-link menu-toggle">
									<i class="menu-icon fas fa-chart-bar"></i>
									<span class="menu-text">Raporlar</span>
								</a>
							</li>

							<li class="menu-item {{ (request()->segment(1) == 'bill') ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
								<a href="{{ route('bill') }}" class="menu-link menu-toggle">
									<i class="menu-icon fas fa-file-invoice"></i>
									<span class="menu-text">Faturalar</span>
								</a>
							</li>

							<li class="menu-item {{ (request()->segment(1) == 'income') ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
								<a href="{{ route('income') }}" class="menu-link menu-toggle">
									<i class="menu-icon fas fa-plus"></i>
									<span class="menu-text">Gelirler</span>
								</a>
							</li>

							<li class="menu-item {{ (request()->segment(1) == 'expense') ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
								<a href="{{ route('expense') }}" class="menu-link menu-toggle">
									<i class="menu-icon fas fa-minus"></i>
									<span class="menu-text">Giderler</span>
								</a>
							</li>

							<li class="menu-item {{ (request()->segment(1) == 'debt') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
								<a href="{{ route('debt') }}" class="menu-link menu-toggle">
									<i class="menu-icon far fa-money-bill-alt"></i>
									<span class="menu-text">Borçlarım</span>
								</a>
							</li>

						</ul>
					</div>
					<!--end::Menu Container-->
				</div>
				<!--end::Aside Menu-->
			</div>
			<!--end::Aside-->
			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper pt-20" id="kt_wrapper">
				<!--begin::Header-->
				<div id="kt_header" class="header header-fixed">
					<!--begin::Container-->
					<div class="container-fluid d-flex align-items-stretch justify-content-between">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
							<!--begin::Header Menu-->
							<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">

								<ul class="menu-nav">
									<li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
										<h5 class="text-dark font-weight-bold my-1 mr-5">{{ getBranchName() }} {{' Muhasebe Sistemi'}}</h5>
									</li>

								</ul>

							</div>
							<!--end::Header Menu-->
						</div>
						<!--end::Header Menu Wrapper-->
						<!--begin::Topbar-->
						<div class="topbar">
							<!--begin::User-->

							<div class="topbar-item">
								<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
									<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Şube değiştir veya</span>
									<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">çıkış yap</span>
									<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
										<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
											<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
												<span class="symbol-label font-size-h5 font-weight-bold"><i class="menu-icon fas fa-cog"></i></span>
											</div>
										</div>
										<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right" style="width: 257px">
											<ul class="navi navi-hover py-4">
												@foreach ($branches as $branch)
												<li class="navi-item">
													<a href="{{ route('keepBranch', $branch->id) }}" class="navi-link">
														<span class="symbol symbol-20 mr-3">
															<i class="fas fa-sharp fa-solid fa-code-branch"></i>
														</span>
														<span class="navi-text">{{ $branch->name }}</span>
													</a>
												</li>
												@endforeach

												<li class="navi-item">
													<a href="{{ route('admin') }}" class="navi-link">
														<span class="symbol symbol-20 mr-3">
															<i class="fas fa-user"></i>
														</span>
														<span class="menu-text">Kullanıcılar</span>
													</a>
												</li>

												<li class="navi-item">
													<a href="{{route('logout')}}" class="navi-link">
														<span class="symbol symbol-20 mr-3">
															<i class="fas fa-sign-out-alt"></i>
														</span>
														<span class="navi-text">Çıkış Yap</span>
													</a>
												</li>
											</ul>
										</div>
									</span>
								</div>
							</div>
							<!--end::User-->
						</div>
						<!--end::Topbar-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Header-->
				<!--begin::Content-->
				<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

					<!--begin::Entry-->
					<div class="d-flex flex-column-fluid">
						<div class="container">