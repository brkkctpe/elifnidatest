<?php
if($_POST){
	
	function gbaglan($a){
	   $ch    = curl_init();
	   curl_setopt($ch, CURLOPT_URL, $a);
	   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($ch, CURLOPT_HEADER, false);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	   $isle = curl_exec($ch);
	   curl_close($ch);
	   return $isle;
	}	
	$reCaptcha   = $_POST["g-recaptcha-response"];
	$Sec   = $site_ayar["recaptcha_gkey"];
	$ip   = $_SERVER['REMOTE_ADDR'];
	$LinkYapisi = "https://www.google.com/recaptcha/api/siteverify?secret=".$Sec."&response=".$reCaptcha."&remoteip=".$ip;
	$Baglan   = gbaglan($LinkYapisi);
	$Kontrol = json_decode($Baglan);

	
	$iletisim_ad = p("iletisim_ad");
	$iletisim_soyad = p("iletisim_soyad");
	$iletisim_adsoyad = p("iletisim_ad")." ".p("iletisim_soyad");
	$iletisim_mail = p("iletisim_mail");
	$iletisim_telefon = p("iletisim_telefon");
	$iletisim_mesaj = p("iletisim_mesaj");
	

	
	if($iletisim_adsoyad=="" or $iletisim_mail=="" or $iletisim_telefon=="" or p("iletisim_mesaj")==""){
		$json['uyari'] = '<div class="alert alert-warning">'.$iletisim_adsoyad.'Lütfen zorunlu alanları boş bırakmayın</div>';
	}elseif(($Kontrol->success) != "1" and $siteayar["ayarlar_mailrecaptcha"]==1){
		$json['uyari'] = '<div class="alert alert-warning">Güvenlik doğrulaması başarısız</div>';
	}else{
		$query="INSERT INTO ".prefix."_iletisim SET 
		iletisim_adsoyad='$iletisim_adsoyad',					
		iletisim_mail='$iletisim_mail',									
		iletisim_telefon='$iletisim_telefon',							
		iletisim_mesaj='$iletisim_mesaj',
		iletisim_kayitzaman='".time()."'
		";
		$ekle=query($query);
		if($ekle){
			ob_start();
			
			?>
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			  <head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title><?=pd("İletişim Mesajı")?></title>
					<style type="text/css">
					body {margin: 0; padding: 0; min-width: 100%!important;}
					.content {width: 100%; max-width: 600px;}  
					</style>
				</head>
				<body style="background:#F3F6F8;">
					<table width="100%" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td>
								<table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td style="text-align:center;"><br><br>
											<img src="<?=str_replace(".webp",".png",info("logodark"))?>" height="100px">
											<br><br><br><br>
										</td>
									</tr>
									<tr>
										<td style="
												border-radius: 20px 20px 0px 0px;
												text-align: center;
												background:linear-gradient(180deg,#ffffff,#F6F8F9)
											">
											<h3><?=pd("Yeni Bir İletişim Mesajı")?></h3>
										</td>
									</tr>
									<tr>
										<td style="background:#ffffff;padding:20px;">
											<h4><?=pd("Ad Soyad")?> : <?=$iletisim_adsoyad?></h4>
											<h4><?=pd("Telefon")?> : <?=$iletisim_telefon?></h4>
											<h4><?=pd("Mail")?> : <?=$iletisim_mail?></h4>
											<p><?=$iletisim_mesaj?></p>
										</td>
									</tr>
								</table>
								<br><br><br>
							</td>
						</tr>
					</table>
				</body>
			</html>
			<?php
			
			$icerik = ob_get_contents();
			ob_end_clean();	
			
			if($siteayar["ayarlar_mailgit1"]){
				$alici[] = $siteayar["ayarlar_mailgit1"];
			}
			if($siteayar["ayarlar_mailgit2"]){
				$alici[] = $siteayar["ayarlar_mailgit2"];
			}
			if($siteayar["ayarlar_mailgit3"]){
				$alici[] = $siteayar["ayarlar_mailgit3"];
			}
			$sonuc = mailgonder($alici,info("sitetitle"),pd("Yeni Bir Iletişim Mesajı"),$icerik,$dosya);
			$json['uyari'] = '<div class="alert alert-success" role="alert">Mesajınızı aldık en kısa sürede sizinle iletişim kuracağız.</div>';
			$json['sil'] = 1;
		}else{
			$json['uyari'] = '<div class="alert alert-danger" role="alert">'.queryalert($query).'</div>';
		}
		
	}
}

echo json_encode($json);

?>

