<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
	<link rel="shortcut icon" type="image/x-icon" href="{{-- asset('assets/panel/favicon.ico') --}}">

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
					<a href="" class="brand-logo">
						<i class="menu-icon fab fa-cpanel fa-5x" id="logoIcon" aria-hidden="true"></i>
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
							<li class="menu-item {{ (request()->segment(1) == 'admin') ? 'menu-item-active' : '' }}" aria-haspopup="true">
								<a href="" class="menu-link">
									<i class="menu-icon fas fa-tachometer-alt"></i>
									<span class="menu-text">Kontrol Paneli</span>
								</a>
							</li>
							<li class="menu-section">
								<h4 class="menu-text">Yönetim</h4>
								<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
							</li>
							<li class="menu-item menu-item-submenu 
										{{ (request()->segment(2) == 'site-settings') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'config') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'social') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'tax-rate') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'cargo') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'currency') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'payment-methods') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'unit-weights') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'country') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'city') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'email') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'sms') ? 'menu-item-active menu-item-open' : '' }}
										" aria-haspopup="true" data-menu-toggle="hover">
								<a class="menu-link menu-toggle">
									<i class="menu-icon fas fa-cogs"></i>
									<span class="menu-text">Ayarlar</span>
									<i class="menu-arrow"></i>
								</a>
								<div class="menu-submenu">
									<i class="menu-arrow"></i>
									<ul class="menu-subnav">

										<li class="menu-item {{ (request()->segment(2) == 'site-settings') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-cog">
													<span></span>
												</i>
												<span class="menu-text">Site Ayarları</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>

										<li class="menu-item {{ (request()->segment(2) == 'config') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-sliders-h">
													<span></span>
												</i>
												<span class="menu-text">Genel Ayarlar</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>
										<li class="menu-item {{ (request()->segment(2) == 'social') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-share-alt">
													<span></span>
												</i>
												<span class="menu-text">Sosyal Medya</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>
										<li class="menu-item {{ (request()->segment(2) == 'tax-rate') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-lira-sign">
													<span></span>
												</i>
												<span class="menu-text">Vergi Oranları</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>
										<li class="menu-item {{ (request()->segment(2) == 'cargo') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-truck">
													<span></span>
												</i>
												<span class="menu-text">Kargo Şirketleri</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>

										<li class="menu-item {{ (request()->segment(2) == 'currency') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon far fa-money-bill-alt">
													<span></span>
												</i>
												<span class="menu-text">Para Birimleri</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>

										<li class="menu-item {{ (request()->segment(2) == 'payment-methods') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fab fa-cc-visa">
													<span></span>
												</i>
												<span class="menu-text">Ödeme Yöntemleri</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>

										<li class="menu-item {{ (request()->segment(2) == 'unit-weights') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-balance-scale">
													<span></span>
												</i>
												<span class="menu-text">Ağırlık Birimleri</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>

										<li class="menu-item menu-item-submenu
										{{ (request()->segment(2) == 'country') ? 'menu-item-active menu-item-open' : '' }}
										{{ (request()->segment(2) == 'city') ? 'menu-item-active menu-item-open' : '' }}
										" aria-haspopup="true" data-menu-toggle="hover">
											<a class="menu-link menu-toggle">
												<i class="menu-icon fas fa-city"></i>
												<span class="menu-text">Ülkeler ve Şehirler</span>
												<i class="menu-arrow"></i>
											</a>
											<div class="menu-submenu">
												<i class="menu-arrow"></i>
												<ul class="menu-subnav">
													<li class="menu-item {{ (request()->segment(2) == 'country') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
														<a href="" class="menu-link">
															<i class="menu-bullet menu-bullet-line">
																<span></span>
															</i>
															<span class="menu-text">Ülkeler</span>
															<span class="menu-label">
																<!-- <span class="label label-rounded label-primary">6</span> -->
															</span>
														</a>
													</li>
													<li class="menu-item {{ (request()->segment(2) == 'city') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
														<a href="" class="menu-link">
															<i class="menu-bullet menu-bullet-line">
																<span></span>
															</i>
															<span class="menu-text">Şehirler</span>
															<span class="menu-label">
																<!-- <span class="label label-rounded label-primary">6</span> -->
															</span>
														</a>
													</li>
												</ul>
											</div>

										<li class="menu-item {{ (request()->segment(2) == 'email') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-envelope-open-text"></i>
												<span class="menu-text">Mail Şablonu Ayarları</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>

										<li class="menu-item {{ (request()->segment(2) == 'sms') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
											<a href="" class="menu-link">
												<i class="menu-icon fas fa-sms"></i>
												<span class="menu-text">SMS Şablonu Ayarları</span>
												<span class="menu-label">
													<!-- <span class="label label-rounded label-primary">6</span> -->
												</span>
											</a>
										</li>
							</li>
						</ul>
					</div>

					<!-- <li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
						<a class="menu-link menu-toggle">
							<i class="menu-icon fas fa-chart-line"></i>
							<span class="menu-text">Analiz</span>
						</a>
					</li> -->



					<li class="menu-item {{ (request()->segment(2) == 'admin') ? 'menu-item-active menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="{{ route('admin') }}" class="menu-link menu-toggle">
							<i class="menu-icon fas fa-user-shield"></i>
							<span class="menu-text">Kullanıcılar</span>
						</a>
					</li>



					<li class="menu-item menu-item-submenu 
					{{ (request()->segment(2) == 'categories') ? 'menu-item-active menu-item-open' : '' }}
					{{ (request()->segment(2) == 'products') ? 'menu-item-active menu-item-open' : '' }}
					{{ (request()->segment(2) == 'variations') ? 'menu-item-active menu-item-open' : '' }}
					{{ (request()->segment(2) == 'brand') ? 'menu-item-active menu-item-open' : '' }}
					" aria-haspopup="true" data-menu-toggle="hover">
						<a class="menu-link menu-toggle">
							<i class="menu-icon fas fa-shopping-cart"></i>
							<span class="menu-text">Katalog</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="menu-submenu">
							<i class="menu-arrow"></i>
							<ul class="menu-subnav">

								<li class="menu-item {{ (request()->segment(2) == 'categories') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon fas fa-tags">
											<span></span>
										</i>
										<span class="menu-text">Kategoriler</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6</span> -->
										</span>
									</a>
								</li>

								<li class="menu-item {{ (request()->segment(2) == 'products') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon fas fa-shopping-bag">
											<span></span>
										</i>
										<span class="menu-text">Ürünler</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6</span> -->
										</span>
									</a>
								</li>

								<li class="menu-item {{ (request()->segment(2) == 'variations') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon fas fa-border-all">
											<span></span>
										</i>
										<span class="menu-text">Ürün Varyasyonları</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6</span> -->
										</span>
									</a>
								</li>

								<li class="menu-item {{ (request()->segment(2) == 'brand') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon far fa-copyright">
											<span></span>
										</i>
										<span class="menu-text">Markalar</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6</span> -->
										</span>
									</a>
								</li>
							</ul>
						</div>
					</li>

					<li class="menu-item {{ (request()->segment(2) == 'orders') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="" class="menu-link menu-toggle">
							<i class="menu-icon fas fa-shopping-basket"></i>
							<span class="menu-text">Siparişler</span>
						</a>
					</li>

					<li class="menu-item {{ (request()->segment(2) == 'discounts') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="" class="menu-link menu-toggle">
							<i class="menu-icon fas fa-percent"></i>
							<span class="menu-text">İndirimler</span>
						</a>
					</li>


					<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
						<a class="menu-link menu-toggle">
							<i class="menu-icon fas fa-puzzle-piece"></i>
							<span class="menu-text">Entegrasyon</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="menu-submenu">
							<i class="menu-arrow"></i>
							<ul class="menu-subnav">

								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link">
										<i class="menu-icon fas fa-puzzle-piece">
											<span></span>
										</i>
										<span class="menu-text">Entegrasyon Ayarları</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6
										</span> -->
										</span>
									</a>
								</li>

								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link">
										<i class="menu-icon fas fa-pager">
											<span></span>
										</i>
										<span class="menu-text">Açıklama Şablonu</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6
										</span> -->
										</span>
									</a>
								</li>
							</ul>
						</div>
					</li>

					<li class="menu-item menu-item-submenu
					{{ (request()->segment(2) == 'customers') ? 'menu-item-active menu-item-open' : '' }}
					{{ (request()->segment(2) == 'bulletin') ? 'menu-item-active menu-item-open' : '' }}
					" aria-haspopup="true" data-menu-toggle="hover">
						<a class="menu-link menu-toggle">
							<i class="menu-icon fas fa-users"></i>
							<span class="menu-text">Müşteriler</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="menu-submenu">
							<i class="menu-arrow"></i>
							<ul class="menu-subnav">

								<li class="menu-item {{ (request()->segment(2) == 'customers') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon fas fa-address-card">
											<span></span>
										</i>
										<span class="menu-text">Müşteri Listesi</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6</span> -->
										</span>
									</a>
								</li>

								<li class="menu-item {{ (request()->segment(2) == 'bulletin') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon fas fa-envelope">
											<span></span>
										</i>
										<span class="menu-text">E-Bülten Listesi</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6</span> -->
										</span>
									</a>
								</li>
							</ul>
						</div>
					</li>

					<li class="menu-item {{ (request()->segment(2) == 'banners') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="" class="menu-link menu-toggle">
							<i class="menu-icon far fa-image"></i>
							<span class="menu-text">Banner</span>
						</a>
					</li>

					<li class="menu-item {{ (request()->segment(2) == 'news') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="" class="menu-link menu-toggle">
							<i class="menu-icon far fa-newspaper"></i>
							<span class="menu-text">Haberler</span>
						</a>
					</li>

					<li class="menu-item {{ (request()->segment(2) == 'pages') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="" class="menu-link menu-toggle">
							<i class="menu-icon far fa-file-alt"></i>
							<span class="menu-text">Sayfalar</span>
						</a>
					</li>

					<li class="menu-item menu-item-submenu 
					{{ (request()->segment(2) == 'comments') ? 'menu-item-active menu-item-open' : '' }}
					" aria-haspopup="true" data-menu-toggle="hover">
						<a class="menu-link menu-toggle">
							<i class="menu-icon fas fa-comments"></i>
							<span class="menu-text">Yorum</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="menu-submenu">
							<i class="menu-arrow"></i>
							<ul class="menu-subnav">

								<li class="menu-item {{ (request()->segment(3) == 'published') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon fas fa-comment">
											<span></span>
										</i>
										<span class="menu-text">Yayınlanmış</span>
										<span class="menu-label">
											<!-- <span class="label label-rounded label-primary">6</span> -->
										</span>
									</a>
								</li>

								<li class="menu-item {{ (request()->segment(3) == 'pending') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
									<a href="" class="menu-link">
										<i class="menu-icon fas fa-clock">
											<span></span>
										</i>
										<span class="menu-text">Onay Bekleyenler</span>
										<span class="menu-label">
											<span class="label label-rounded label-primary"></span>
										</span>
									</a>
								</li>

							</ul>
						</div>
					</li>

					<li class="menu-item {{ (request()->segment(2) == 'notifications') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="" class="menu-link menu-toggle">
							<i class="menu-icon far fa-file-alt"></i>
							<span class="menu-text">Havale/EFT Bildirimleri</span>
							<span class="menu-label">
								<span class="label label-rounded label-primary"></span>
							</span>
						</a>
					</li>

					<li class="menu-item {{ (request()->segment(2) == 'rebate') ? 'menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
						<a href="" class="menu-link menu-toggle">
							<i class="menu-icon fa fa-undo"></i>
							<span class="menu-text">Sipariş İade Bildirimleri</span>
							<span class="menu-label">
								<span class="label label-rounded label-primary"></span>
							</span>
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
									<h5 class="text-dark font-weight-bold my-1 mr-5">{{'Boltat Muhasebe Sistemi'}}</h5>
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
								<a href="{{ route('logout') }}" class="navi-link">
									<span class="symbol symbol-20 mr-3">
										<i class="fas fa-sign-out-alt"></i>
									</span>
									<span class="navi-text decoration-none">Çıkış Yap</span>
								</a>
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