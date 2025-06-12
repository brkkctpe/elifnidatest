<?php
if(
	$urlget[0]=="kisisel-bilgilerim"
	or $urlget[0]=="olcum-gir"
	or $urlget[0]=="olcumlerim"
	or $urlget[0]=="diyetlerim"
	or $urlget[0]=="randevular"
	or $urlget[0]=="odemelerim"
	or $urlget[0]=="onemli-notlar"
	or $urlget[0]=="olcum-duzenle"
	or $urlget[0]=="olcum-goruntule"
	or $urlget[0]=="diyetdetay"
	or $urlget[0]=="diyetnot"
){
?><!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
	<!-- Line Awesome CSS -->
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/assetspanel/css/line-awesome.min.css">
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/assetspanel/css/bootstrap.min.css">
	<!-- Main CSS -->
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/assetspanel/css/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/assetspanel/css/fullcalendar.print.min.css">
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/assetspanel/css/style.css">
	
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/mainjscss/toastr-master/toastr.css">
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/mainjscss/jquery-ui.min.css">
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/mainjscss/loaders.css">

    <title><?=$title?></title>
	<meta name="description" content="<?=$desc?>" />
	<meta name="keywords" content="<?=$keyw?>" />
	<link rel="canonical" href="<?="https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
	<meta property="og:title" content="<?=$title?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
	<meta property="og:image" content="<?=$image?>" />
	<meta property="og:site_name" content="<?=$title?>" />
	<meta property="og:description" content="<?=$desc?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?=$title?>" />
	<meta name="twitter:description" content="<?=$desc?>" />
	<meta name="twitter:image" content="<?=$image?>" />
	<meta itemprop="image" content="<?=$image?>" /> 
	<link rel="shortcut icon" href="<?=$uyefavicon!="" ? siteurl."app/Images/".$uyefavicon : info("favicon")?>">
	<?php foreach($diller as $deger){ ?>
	<link rel="alternate" hreflang="<?=$deger["dil_uzanti"]?>" href="<?=siteurl.$deger["dil_uzanti"]."/"?>" />	
	<?php } ?>
	
	<?=$siteayar["ayarlar_siteheader"]?>	 
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TKJ5Q2CQ');</script>
<!-- End Google Tag Manager -->
		
	
</head>

<body  data-url="<?=siteurl?>">
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TKJ5Q2CQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-4">
		<div class="logo">
			<img src="<?=info("logodark")?>">
			<a href="javascript:;" class="btn btn-success p-3 d-inline-flex d-md-none" id="menuac"><i class="las la-bars"></i></a>
		</div>
		<div class="card sol menualan">
			<div class="card-body">
				<div class="user">
					<img src="<?=rg($config["uye"]["uye_resim"])?>">
					<div class="adi">
						<?=pd("Hoşgeldin")?><br><?=ss($config["uye"]["uye_ad"])?> <?=ss($config["uye"]["uye_soyad"])?>
					</div>
				</div>
				<ul class="nav flex-column">
				  <li class="nav-item <?=ld($urlget[0])=="kisisel-bilgilerim" ? "active" : ""?>">
					<a class="nav-link" href="<?=url.ld("kisisel-bilgilerim")?>">
					  <span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-kisisel.png"></span>
					  <?=pd("Kişisel Bilgilerim")?>
					</a>
				  </li>
				  <li class="nav-item <?=ld($urlget[0])=="olcum-gir" ? "active" : ""?>">
					<a class="nav-link" href="<?=url.ld("olcum-gir")?>">
					   <span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-olcumgir.png"></span>
					   <?=pd("Ölçüm Gir")?>
					</a>
				  </li>
				  <li class="nav-item <?=ld($urlget[0])=="olcumlerim" ? "active" : ""?>">
					<a class="nav-link" href="<?=url.ld("olcumlerim")?>">
					   <span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-olcumlerim.png"></span>
					   <?=pd("Ölçümlerim")?>
					</a>
				  </li>
				  <li class="nav-item <?=ld($urlget[0])=="diyetlerim" ? "active" : ""?>">
					<a class="nav-link" href="<?=url.ld("diyetlerim")?>">
						<span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-diyetlerim.png"></span>
						<?=pd("Diyetlerim")?>
					</a>
				  </li>
				  <li class="nav-item <?=ld($urlget[0])=="randevular" ? "active" : ""?>">
					<a class="nav-link" href="<?=url.ld("randevular")?>">
					   <span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-beslenme.png"></span>
						<?=pd("Randevular")?>
					</a>
				  </li>
				  <li class="nav-item <?=ld($urlget[0])=="odemelerim" ? "active" : ""?>">
					<a class="nav-link" href="<?=url.ld("odemelerim")?>">
						<span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-odemeler.png"></span>
						<?=pd("Ödemelerim")?>
					</a>
				  </li>
				  <li class="nav-item d-none <?=ld($urlget[0])=="onemli-notlar" ? "active" : ""?>">
					<a class="nav-link" href="<?=url.ld("onemli-notlar")?>">
					   <span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-onemlinotlar.png"></span>
					   <?=pd("Önemli Notlar")?>
					</a>
				  </li>
				</ul>
				<ul class="nav flex-column mb-2">
				  <li class="nav-item">
					<a class="nav-link" href="<?=url?>">
						<span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-geridon.png"></span>
						<?=pd("Siteye Geri Dön")?>
					</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="<?=url?>cikis">
						<span><img src="<?=siteurl.themeurl?>/assetspanel/img/icon-cikis.png"></span>
						<?=pd("Çıkış")?>
					</a>
				  </li>
				</ul>
			</div>
		</div>
    </nav>

    <main role="main" class="col-md-8">

<?php
}else{
?>
<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="<?=siteurl.themeurl?>/assets/css/style.css" rel="stylesheet">
    <link href="<?=siteurl.themeurl?>/assets/css/responsive.css" rel="stylesheet">
	
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/mainjscss/toastr-master/toastr.css">
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/mainjscss/jquery-ui.min.css">
    <link rel="stylesheet" href="<?=siteurl.themeurl?>/mainjscss/loaders.css">

    <title><?=$title?></title>
	<meta name="description" content="<?=$desc?>" />
	<meta name="keywords" content="<?=$keyw?>" />
	<link rel="canonical" href="<?="https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
	<meta property="og:title" content="<?=$title?>" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
	<meta property="og:image" content="<?=$image?>" />
	<meta property="og:site_name" content="<?=$title?>" />
	<meta property="og:description" content="<?=$desc?>" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?=$title?>" />
	<meta name="twitter:description" content="<?=$desc?>" />
	<meta name="twitter:image" content="<?=$image?>" />
	<meta itemprop="image" content="<?=$image?>" /> 
	<link rel="shortcut icon" href="<?=$uyefavicon!="" ? url."app/Images/".$uyefavicon : info("favicon")?>">
	<?php foreach($diller as $deger){ ?>
	<link rel="alternate" hreflang="<?=$deger["dil_uzanti"]?>" href="<?=siteurl.$deger["dil_uzanti"]."/"?>" />	
	<?php } ?>
	
	
	<?=$siteayar["ayarlar_siteheader"]?>
	
</head>

<body class="scrollbar" data-url="<?=siteurl?>">
<main>
		<section id="header">
			<div class="container-fluid">
				<div class="alan">
					<div class="sol">
						<div class="ust">
							<a href="tel:<?=info("telefon1")?>" class="bilgi">
								<i class="las la-phone-volume"></i>
								<?=info("telefon1")?>
							</a>
							<a href="mailto:<?=info("mail")?>" class="bilgi">
								<i class="las la-envelope"></i>
								<?=info("mail")?>
							</a>
						</div>
						<div class="menu">
							<ul>
								<?= menu("Header Menü Sol","",0) ?>
							</ul>
						</div>
					</div>
					<div class="orta">
						<a href="<?=url?>" class="logo">
							<img src="<?=info("logodark")?>">
						</a>
					</div>
					<div class="sag">
						<div class="ust">
						
							<?php if($config["uye"]["uye_id"]>0){ ?>
							<a href="<?=url.ld("kisisel-bilgilerim")?>" class="bilgi">
								<i class="las la-user"></i>
								<?=pd("Hesabım")?>
							</a>
							<?php }else{ ?>
							<a href="<?=url.ld("giris")?>" class="bilgi">
								<i class="las la-user"></i>
								<?=pd("Kullanıcı Girişi")?>
							</a>
							<?php } ?>
							<a href="<?=url.ld("sepet")?>" class="bilgi">
								<i class="las la-shopping-bag"></i>
								<?=pd("Sepetim")?> <span class="sepetsayi">0</span>
							</a>
							<div class="sosyal">
								<?php if(info("facebook")!=""){ ?>
								<a href="<?=info("facebook")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-facebook-f"></i></a>
								<?php } ?>
								<?php if(info("linkedin")!=""){ ?>
								<a href="<?=info("linkedin")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-linkedin"></i></a>
								<?php } ?>
								<?php if(info("instagram")!=""){ ?>
								<a href="<?=info("instagram")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-instagram"></i></a>
								<?php } ?>
								<?php if(info("youtube")!=""){ ?>
								<a href="<?=info("youtube")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-youtube"></i></a>
								<?php } ?>
								<?php if(info("whatsapp")!=""){ ?>
				                <a href="https://wa.me/<?=info("whatsapp")?>" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a>
				                <?php } ?>
								<?php if(info("twitter")!=""){ ?>
				                <a href="<?=info("twitter")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-x-twitter"></i></a>
				                <?php } ?>
							</div>
						</div>
						<div class="menu">
							<ul>
								<?= menu("Header Menü Sağ","",0) ?>
							</ul>
						</div>
					</div>
					<a href="<?=url.ld("urunler")?>" class="enshop">
						<img src="<?=trg("enshop.png")?>" alt="enshop">
					</a>
				</div>
			</div>
		</section>

		<section id="mobilheader">
			<div class="alansol">
				<?php if($config["uye"]["uye_id"]>0){ ?>
				<a href="<?=url.ld("kisisel-bilgilerim")?>" class="btn" >
					<i class="las la-user"></i>
				</a>
				<a href="<?=url.ld("sepet")?>" class="btn" >
					<i class="las la-shopping-cart"></i>
				</a>
				<?php }else{ ?>
				<a href="<?=url.ld("giris")?>" class="btn" >
					<i class="las la-user"></i>
				</a>
				<?php } ?>
			</div>
			<div class="alanorta">
				<a href="<?=url?>" class="logo">
					<img src="<?=info("logodark")?>">
				</a>
			</div>
			<div class="alansag">
				<a href="javascript:;" class="btn"  onclick="
						$('#mobilmenu').css({'transform': 'translateX(0px)'},100);">
					<i class="las la-bars"></i>
				</a>
			</div>
		</section>
		
		<section id="mobilmenu">
			<div class="ust">
				<img src="<?=info("logodark")?>" class="logo">
				
				<a href="javascript:;" class="kapat" onclick="
				$(this).parents('#mobilmenu').css({'transform': 'translateX(-100%)'},100);"><i class="las la-times"></i></a>
			</div>
			<div class="menu">
				<ul>
					<?=menu("Mobil Menü","",0)?>
				</ul>
			</div>
			<div class="sosyal">
				<?php if(info("facebook")!=""){ ?>
				<a href="<?=info("facebook")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-facebook-f"></i></a>
				<?php } ?>
				<?php if(info("linkedin")!=""){ ?>
				<a href="<?=info("linkedin")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-linkedin"></i></a>
				<?php } ?>
				<?php if(info("instagram")!=""){ ?>
				<a href="<?=info("instagram")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-instagram"></i></a>
				<?php } ?>
				<?php if(info("youtube")!=""){ ?>
				<a href="<?=info("youtube")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-youtube"></i></a>
				<?php } ?>
				<?php if(info("whatsapp")!=""){ ?>
				<a href="https://wa.me/<?=info("whatsapp")?>" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a>
				<?php } ?>
				<?php if(info("twitter")!=""){ ?>
				<a href="<?=info("twitter")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-x-twitter"></i></a>
				<?php } ?>
			</div>
		</section>			

		<button type="button" data-islem="sepetgetir" data-deger="1" id="sepetgetir" style="display:none;"></button>
<?php } ?>		
		