<?php
	require "../app/Config/config-db.php";
	$dir = "../app/Helper/";
	if(is_dir($dir))
	{
		if($handle = opendir($dir))
		{
			while(($file = readdir($handle)) !== false)
			{
				if($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db"/*Bazi sinir bozucu windows dosyalari.*/)
				{
					require "../app/Helper/".$file;
					
				}
			}
			closedir($handle);
		}
	}else{
	}

	require "../app/Config/config-site.php";	
	
	define("ADMIN",true);
?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="">
		<meta charset="utf-8" />
		<title>Admin Panel</title>
		<!--begin::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<link href="main.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<!--end::Head-->
	<?php if($config["yonetici"]["yonetici_id"]!=""){ ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
			<!--begin::Logo-->
			<a href="index.php">
				<img alt="Logo" src="<?=info("logolight")?>"  style="max-width: 100%;max-height: 40px;"/>
			</a>
			<!--end::Logo-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center">
				<!--begin::Aside Mobile Toggle-->
				<button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
					<span></span>
				</button>
				<!--end::Aside Mobile Toggle-->
				<!--begin::Header Menu Mobile Toggle-->
				<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
					<span></span>
				</button>
				<!--end::Header Menu Mobile Toggle-->
				<!--begin::Topbar Mobile Toggle-->
				<button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<i class="flaticon2-user"></i>
				</button>
				<!--end::Topbar Mobile Toggle-->
			</div>
			<!--end::Toolbar-->
		</div>
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Aside-->
				<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
					<!--begin::Brand-->
					<div class="brand flex-column-auto" id="kt_brand">
						<!--begin::Logo-->
						<a href="index.php" class="brand-logo">
							<img alt="Logo" src="<?=info("logolight")?>"  style="max-width: 100%;max-height: 40px;"/>
						</a>
						<!--end::Logo-->
						<!--begin::Toggle-->
						<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24" />
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>
						</button>
						<!--end::Toolbar-->
					</div>
					<!--end::Brand-->
					<!--begin::Aside Menu-->
					<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
						<!--begin::Menu Container-->
						<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
							<!--begin::Menu Nav-->
							<ul class="menu-nav">
								<li class="menu-item menu-item-active" aria-haspopup="true">
									<a href="index.php" class="menu-link">
										<span class="svg-icon menu-icon">
											<i class="flaticon-home"></i>
										</span>
										<span class="menu-text">Anasayfa</span>
									</a>
								</li>
								<li class="menu-section">
									<h4 class="menu-text">Moduller</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								
								<?php
								
									$modulayar = unserialize($config["ayar"]["ayarlar_sitemodul"]);
									ksort($modulayar);
									foreach($modulayar as $sira=>$dyaz){
										if(!strstr($dyaz,".")){
											$menubilgi = array();
											if(file_exists("modul/".$dyaz."/bilgi.php")){
												require "modul/".$dyaz."/bilgi.php";
											}
											if($menubilgi["adi"]!="" and in_array($dyaz,$config["yetki"]["sayfa"])){
											?>
												<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
													<a href="javascript:;" class="menu-link menu-toggle">
														<span class="svg-icon menu-icon">
															<?=$menubilgi["icon"]?>
														</span>

														<span class="menu-text"><?=$menubilgi["adi"]?></span>
														<i class="menu-arrow"></i>
													</a>
													<div class="menu-submenu">
														<i class="menu-arrow"></i>
														<ul class="menu-subnav">
															<?php
															foreach($menubilgi["altlink"] as $deger){ 
															?>
															<li class="menu-item" aria-haspopup="true">
																<a href="index.php?mo=<?=$deger["link"]?>" class="menu-link">
																	<i class="menu-bullet menu-bullet-line">
																		<span></span>
																	</i>
																	<span class="menu-text"><?=$deger["adi"]?></span>
																</a>
															</li>
															<?php
															}
															?>
														</ul>
													</div>
												</li>
											<?php
											}
										}
									}
								?>
								<li class="menu-section">
									<h4 class="menu-text">Genel</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<?php if(in_array("sabit",$config["yetki"]["sayfa"])){ ?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-tabs"></i>
										</span>

										<span class="menu-text">Sabitler</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=sabit_ekle" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Sabit Ekle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=sabit_listele" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Sabit Listele</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("sayfa",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-file"></i>
										</span>

										<span class="menu-text">Sayfalar</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=sayfa_ekle" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Sayfa Ekle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=sayfa_listele" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Sayfa Listele</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("uye",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-user"></i>
										</span>

										<span class="menu-text">Üyeler</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=uye_ekle" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Üye Ekle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=uye_listele" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Üye Listele</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("resimler",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="index.php?do=resimler_listele" class="menu-link ">
										<span class="svg-icon menu-icon">
											<i class="flaticon-folder"></i>
										</span>

										<span class="menu-text">Resimler</span>
									</a>
								</li>
								<?php 
								}
								if(in_array("iletisim",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="index.php?do=iletisim_listele" class="menu-link ">
										<span class="svg-icon menu-icon">
											<i class="flaticon-chat-1"></i>
										</span>

										<span class="menu-text">İletişim</span>
									</a>
								</li>
								<?php 
								}
								if(in_array("ayarlar",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="index.php?do=ayarlar_toplumail" class="menu-link ">
										<span class="svg-icon menu-icon">
											<i class="flaticon-multimedia-2"></i>
										</span>

										<span class="menu-text">Toplu Mail</span>
									</a>
								</li>
								<?php 
								}
								?>
								<li class="menu-section">
									<h4 class="menu-text">Yönetim</h4>
									<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
								</li>
								<?php 
								if(in_array("ayarlar",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-cogwheel-1"></i>
										</span>

										<span class="menu-text">Ayarlar</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=ayarlar_genel" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Genel Ayarlar</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=ayarlar_logo" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Logo Ayarları</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=ayarlar_iletisim" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">İletişim Ayarları</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=ayarlar_smtp" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">SMTP Ayarları</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("menu",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-apps"></i>
										</span>

										<span class="menu-text">Menüler</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=menu_ekle" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Menü Ekle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=menu_listele" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Menüler</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("rutbe",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-map"></i>
										</span>

										<span class="menu-text">Rütbeler</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=rutbe_ekle" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Rütbe Ekle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=rutbe_listele" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Rütbeler</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("yonetici",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-customer"></i>
										</span>

										<span class="menu-text">Yöneticiler</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=yonetici_ekle" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Yönetici Ekle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=yonetici_listele" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Yönetici Listele</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("dil",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<i class="flaticon-map-location"></i>
										</span>

										<span class="menu-text">Dil</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu">
										<i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=dil_ekle" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Dil Ekle</span>
												</a>
											</li>
											<li class="menu-item" aria-haspopup="true">
												<a href="index.php?do=dil_listele" class="menu-link">
													<i class="menu-bullet menu-bullet-line">
														<span></span>
													</i>
													<span class="menu-text">Dil Listele</span>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<?php 
								}
								if(in_array("log",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="index.php?do=log_listele" class="menu-link ">
										<span class="svg-icon menu-icon">
											<i class="flaticon-list-3"></i>
										</span>

										<span class="menu-text">Log Kayıtları</span>
									</a>
								</li>
								<?php 
								}
								if(in_array("robottxt",$config["yetki"]["sayfa"])){ 
								?>
								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="index.php?do=robottxt_duzenle" class="menu-link ">
										<span class="svg-icon menu-icon">
											<i class="flaticon-browser"></i>
										</span>

										<span class="menu-text">Robot TXT</span>
									</a>
								</li>
								<?php 
								}
								?>
								<li class="menu-item" aria-haspopup="true" data-menu-toggle="hover">
									<a href="<?=url."sitemap.php"?>" class="menu-link " target="_blank">
										<span class="svg-icon menu-icon">
											<i class="flaticon-map"></i>
										</span>

										<span class="menu-text">Sitemap</span>
									</a>
								</li>
							</ul>
							<!--end::Menu Nav-->
						</div>
						<!--end::Menu Container-->
					</div>
					<!--end::Aside Menu-->
				</div>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">
						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
							<!--begin::Header Menu Wrapper-->
							<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
								<!--begin::Header Menu-->
								<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
									<!--begin::Header Nav-->								
									<ul class="menu-nav">
										<li class="menu-item menu-item-submenu menu-item-rel menu-item-active menu-item-open-dropdown">
											<a href="<?=url?>" class="menu-link" target="_blank">
												<span class="menu-text">Siteyi Gör</span>
												<i class="menu-arrow"></i>
											</a>
										</li>
										<li class="menu-item menu-item-submenu menu-item-rel menu-item-active menu-item-open-dropdown">
											<a href="javascript:;" data-islem="sqlyedek" data-deger="1" class="menu-link" target="_blank">
												<span class="menu-text">SQL Yedek Al & İndir</span>
												<i class="menu-arrow"></i>
											</a>
										</li>
										<li class="menu-item menu-item-submenu menu-item-rel menu-item-active menu-item-open-dropdown">
											<a href="<?=siteurl."app/Bot/pdcek.php"?>" class="menu-link" target="_blank">
												<span class="menu-text">Dil Verilerini Eşleştir</span>
												<i class="menu-arrow"></i>
											</a>
										</li>
										<li class="menu-item menu-item-submenu menu-item-rel menu-item-active menu-item-open-dropdown">
											<a href="javascript:;" 
											   data-islem="ayarlar" 
											   data-deger="1"
											   data-ickisim="versiyonindir"
											   class="menu-link" >
												<span class="menu-text">Versiyon Güncelle</span>
												<i class="menu-arrow"></i>
											</a>
										</li>
									</ul>
									<!--end::Header Nav-->

								</div>
								<!--end::Header Menu-->
								
							</div>
							<!--end::Header Menu Wrapper-->
							<!--begin::Topbar-->
							<div class="topbar">
								<!--begin::Languages-->
								<div class="dropdown">
									<!--begin::Toggle-->
									<div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
										<div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
											<img class="h-20px w-20px rounded-sm" src="<?=rg($diller[dil]["dil_bayrak"])?>" alt="" />
										</div>
									</div>
									<!--end::Toggle-->
									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
										<!--begin::Nav-->
										<ul class="navi navi-hover py-4">
											<?php foreach($diller as $deger){ ?>
											<!--begin::Item-->
											<li class="navi-item">
												<a href="index.php?do=dilsec&id=<?=$deger["dil_uzanti"]?>" class="navi-link">
													<span class="symbol symbol-20 mr-3">
														<img src="<?=rg($deger["dil_bayrak"])?>" alt="" />
													</span>
													<span class="navi-text"><?=ss($deger["dil_adi"])?></span>
												</a>
											</li>
											<!--end::Item-->
											<?php } ?>
										</ul>
										<!--end::Nav-->
									</div>
									<!--end::Dropdown-->
								</div>
								<!--end::Languages-->
								<!--begin::User-->
								<div class="topbar-item">
									<div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
										<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"><?=$config["yonetici"]["yonetici_ad"]?>,</span>
										<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?=$config["yonetici"]["yonetici_soyad"]?></span>
										<span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold"><?=$config["yonetici"]["yonetici_ad"][0]?></span>
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
						<?php
							if($_GET["mo"]!=""){
									$urlbol = explode("_",$_GET["mo"]);
									$ilkkisim = $urlbol[0];
									$ickisim = $urlbol[1];
								if(in_array($ilkkisim,$config["yetki"]["sayfa"])){
									require "modul/".$ilkkisim."/inc.php";
								}else{
									?>
									<div class="alert alert-custom alert-warning" role="alert">
										<div class="alert-icon">
											<i class="flaticon-warning"></i>
										</div>
										<div class="alert-text">Bu sayfaya ulaşma yetkiniz bulunmuyor.</div>
									</div>
									<?php
								}
							}elseif($_GET["do"]!=""){
									$urlbol = explode("_",$_GET["do"]);
									$ilkkisim = $urlbol[0];
									$ickisim = $urlbol[1];
								if(in_array($ilkkisim,$config["yetki"]["sayfa"])){
									require "inc/".$urlbol[0].".php";
								}else{
									?>
									<div class="alert alert-custom alert-warning" role="alert">
										<div class="alert-icon">
											<i class="flaticon-warning"></i>
										</div>
										<div class="alert-text">Bu sayfaya ulaşma yetkiniz bulunmuyor.</div>
									</div>
									<?php
								}
							}else{
								require "inc/anasayfa.php";
							}
						?>
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2021©</span>
							</div>
							<!--end::Copyright-->
							<!--begin::Nav-->
							<div class="nav nav-dark">
								<a href="index.php?do=dokuman" target="_blank" class="nav-link pl-0 pr-5">Döküman</a>
							</div>
							<!--end::Nav-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
				<h3 class="font-weight-bold m-0">Yönetici Profili
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<!--begin::Header-->
				<div class="d-flex align-items-center mt-5">
					<div class="symbol symbol-100 mr-5">
						<div class="symbol-label" style="background-image:url('<?=url."app/Images/".$config["yonetici"]["yonetici_resim"]?>')"></div>
						<i class="symbol-badge bg-success"></i>
					</div>
					<div class="d-flex flex-column">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?=$config["yonetici"]["yonetici_ad"]." ".$config["yonetici"]["yonetici_soyad"]?></a>
						<div class="text-muted mt-1">Yönetici</div> 
						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary"><?=$config["yonetici"]["yonetici_mail"]?></span>
								</span>
							</a>
							<a href="index.php?do=cikis" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Çıkış</a>
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Separator-->
				<div class="separator separator-dashed mt-8 mb-5"></div>
				<!--end::Separator-->
				<!--begin::Nav-->
				<div class="navi navi-spacer-x-0 p-0">
					<!--begin::Item-->
					<a href="custom/apps/user/profile-1/personal-information.html" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-success">
										<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
												<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">Profil</div>
								<div class="text-muted">Hesap Ayarları & Bilgiler
							</div>
							</div>
						</div>
					</a>
					<!--end:Item-->
					<!--begin::Item-->
					<a href="custom/apps/user/profile-3.html" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-warning">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Chart-bar1.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5" />
												<rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5" />
												<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero" />
												<rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">Mesajlar</div>
								<div class="text-muted">Gelen & Giden Mesajlar</div>
							</div>
						</div>
					</a>
					<!--end:Item-->
					<!--begin::Item-->
					<a href="custom/apps/user/profile-2.html" class="navi-item">
						<div class="navi-link">
							<div class="symbol symbol-40 bg-light mr-3">
								<div class="symbol-label">
									<span class="svg-icon svg-icon-md svg-icon-danger">
										<!--begin::Svg Icon | path:assets/media/svg/icons/Files/Selected-file.svg-->
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg>
										<!--end::Svg Icon-->
									</span>
								</div>
							</div>
							<div class="navi-text">
								<div class="font-weight-bold">Hareketlerim</div>
								<div class="text-muted">Log Kayıtları & Bildirimler</div>
							</div>
						</div>
					</a>
					<!--end:Item-->
				</div>
				<!--end::Nav-->
			</div>
			<!--end::Content-->
		</div>
		<!-- end::User Panel-->
		
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		<div class="modal fade" id="ortam" tabindex="-1" role="dialog" aria-labelledby="ortam" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-body">
					</div>
				</div>
			</div>
		</div>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Vendors(used by this page)-->
		<script src="assets/js/pages/crud/file-upload/image-input.js"></script>
		<script src="assets/js/pages/crud/forms/editors/summernote.js"></script>
		<script src="assets/js/jquery.nestable.js"></script>
		<script src="assets/toastr-master/toastr.js"></script>
		<script src="assets/moment.min.js"></script>
		<script src="assets/fullcalendar.min.js"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/widgets.js"></script>
		<script src="main.js"></script>
		<!--end::Page Scripts-->
		<script>
		var KTSummernoteDemo = function () {
		 // Private functions
		 var demos = function () {
		  $('.summernote').summernote({
		   height: 350
		  });
		 }

		 return {
		  // public functions
		  init: function() {
		   demos();
		  }
		 };
		}();

		// Initialization
		jQuery(document).ready(function() {
		 KTSummernoteDemo.init();
		});
		</script>
	
<script>

$(document).ready(function()
{

	$('.timepicker-24').timepicker({
		autoclose: true,
		minuteStep: 1,
		showSeconds: false,
		showMeridian: false,
		dynamic: true,
		defaultTime: $(this).val(),
		pickerPosition: 'top-left'
	});
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput)
	.on('click', '.delete', function() {
		$(this).closest('li').remove();
		updateOutput($('#nestable').data('output', $('#nestable-output')));
	});


    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });
	
	function nestdegis(){
		
		var updateOutput = function(e)
		{
			var list   = e.length ? e : $(e.target),
				output = list.data('output');
			if (window.JSON) {
				output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
			} else {
				output.val('JSON browser support required for this demo.');
			}
		};

		// activate Nestable for list 1
		$('#nestable').nestable({
			group: 1
		})
		.on('change', updateOutput);


		// output initial serialised data
		updateOutput($('#nestable').data('output', $('#nestable-output')));

		$('#nestable-menu').on('click', function(e)
		{
			var target = $(e.target),
				action = target.data('action');
			if (action === 'expand-all') {
				$('.dd').nestable('expandAll');
			}
			if (action === 'collapse-all') {
				$('.dd').nestable('collapseAll');
			}
		});
	}

});
</script>

<?php if(isset($calendar)) { ?>
<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({
	monthNames: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
	monthNamesShort: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
	dayNames: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
	dayNamesShort: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
	buttonText: {
		today:    'Bugün',
		month:    'Ay',
		week:     'Hafta',
		day:      'Gün',
		list:     'Liste',
		listMonth: 'Aylık Liste',
		listYear: 'Yıllık Liste',
		listWeek: 'Haftalık Liste',
		listDay: 'Günlük Liste'
	},
	header: {
	left: 'prev,next today',
	center: 'title',
	right: 'month,basicWeek,basicDay'
	},
   	navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true,
        defaultDate: '<?=date("Y-m-d")?>',
        dayClick: function(date) {
            $.get('Ajax/randevuTimes.php', {tarih: date.format('YYYY-MM-DD')}, function(html){
                $('#randevuModal .modal-body').html(html);
                $('#randevuModal').modal('show');
            });
        },
        events: [
                <?=implode(",",$calendar);?>
        ]
    });

  });

</script>
<?php } ?>

	</body>
	<!--end::Body-->
	<?php }else{ ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
					<!--begin::Aside Top-->
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<!--begin::Aside header-->
						<a href="#" class="text-center mb-10">
							<img src="<?=info("logolight")?>" class="max-h-70px" style="filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.3));" alt="" />
						</a>
						<!--end::Aside header-->
						<!--begin::Aside title-->
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Hızlı, Kolay ve Modüler
						<br />Yapısı İle Mükemmel!</h3>
						<!--end::Aside title-->
					</div>
					<!--end::Aside Top-->
					<!--begin::Aside Bottom-->
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(assets/media/svg/illustrations/login-visual-1.svg)"></div>
					<!--end::Aside Bottom-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
						<!--begin::Signin-->
						<div class="login-form login-signin">
							<!--begin::Form-->
							<form class="form" action="javascript:;" method="post" id="giris" data-ajaxform="true">
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Hoşgeldiniz </h3>
								</div>
								<!--begin::Title-->
								<!--begin::Form group-->
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="text" name="yonetici_mail" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Parola</label>
									</div>
									<input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg" type="password" name="yonetici_parola" autocomplete="off" />
								</div>
								<!--end::Form group-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<div class="gloader"></div>
									<div class="sonuc"></div>
								</div>
								<!--end::Action-->
								<!--begin::Action-->
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Giriş Yap</button>
								</div>
								<!--end::Action-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signin-->
						
					</div>
					<!--end::Content body-->
					<!--begin::Content footer-->
					<div class="d-flex justify-content-lg-start justify-content-center align-items-end py-7 py-lg-0">
						<div class="text-dark-50 font-size-lg font-weight-bolder mr-10">
							<span class="mr-1">2021©</span>
						</div>
					</div>
					<!--end::Content footer-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="assets/js/pages/custom/login/login-general.js"></script>
		<script src="main.js"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->		
	<?php } ?>
</html>
