<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "ayarlar";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	##-------------------------Genel Ayarlar----------------------#
	if($ickisim=="genel"){
		if($config["yetki"]["duzenle"]==1){
			$ayarlar_sitetitle=ass(p("ayarlar_sitetitle"));
			$ayarlar_sitedesc=ass(p("ayarlar_sitedesc"));
			$ayarlar_sitekeyw=ass(p("ayarlar_sitekeyw"));
			$ayarlar_siteurl=ass(p("ayarlar_siteurl"));
			$ayarlar_sitetema=ass(p("ayarlar_sitetema"));
			$ayarlar_sitedil=ass(p("ayarlar_sitedil"));
			$ayarlar_sitecache=ass(p("ayarlar_sitecache"));
			$ayarlar_sitelazy=ass(p("ayarlar_sitelazy"));
			$ayarlar_siteminify=ass(p("ayarlar_siteminify"));
			$ayarlar_siteheader=ass($_POST["ayarlar_siteheader"]);
			$ayarlar_sitefooter=ass($_POST["ayarlar_sitefooter"]);
			$ayarlar_bakimda=ass(p("ayarlar_bakimda"));
			$ayarlar_siterenk1=ass(p("ayarlar_siterenk1"));
			$ayarlar_siterenk2=ass(p("ayarlar_siterenk2"));
			$ayarlar_siterenk3=ass(p("ayarlar_siterenk3"));
			$ayarlar_siterenk4=ass(p("ayarlar_siterenk4"));
			
			$ayarlar_iyzico_api_key=vsy(p("ayarlar_iyzico_api_key"));
			$ayarlar_iyzico_api_secret=vsy(p("ayarlar_iyzico_api_secret"));
			$ayarlar_iyzico_base_url=vsy(p("ayarlar_iyzico_base_url"));
			
			if($ayarlar_sitetitle=="" or $ayarlar_sitedesc=="" or $ayarlar_siteurl=="" or $ayarlar_sitetema=="" or $ayarlar_sitedil==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				$query="UPDATE ".prefix."_ayarlar SET 
				ayarlar_sitetitle='$ayarlar_sitetitle',
				ayarlar_sitedesc='$ayarlar_sitedesc',
				ayarlar_sitekeyw='$ayarlar_sitekeyw',
				ayarlar_siteurl='$ayarlar_siteurl',
				ayarlar_sitetema='$ayarlar_sitetema',
				ayarlar_sitedil='$ayarlar_sitedil',
				ayarlar_sitecache='$ayarlar_sitecache',
				ayarlar_sitelazy='$ayarlar_sitelazy',
				ayarlar_siteminify='$ayarlar_siteminify',
				ayarlar_siteheader='$ayarlar_siteheader',
				ayarlar_sitefooter='$ayarlar_sitefooter',
				ayarlar_bakimda='$ayarlar_bakimda',
				ayarlar_siterenk1='$ayarlar_siterenk1',
				ayarlar_siterenk2='$ayarlar_siterenk2',
				ayarlar_siterenk3='$ayarlar_siterenk3',
				ayarlar_siterenk4='$ayarlar_siterenk4',
				ayarlar_iyzico_api_key='$ayarlar_iyzico_api_key',
				ayarlar_iyzico_api_secret='$ayarlar_iyzico_api_secret',
				ayarlar_iyzico_base_url='$ayarlar_iyzico_base_url'
				";
				$ekle=query($query);
				if($ekle){
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	
	
	##-------------------------Logo Ayarları----------------------#
	if($ickisim=="logo"){
		if($config["yetki"]["duzenle"]==1){
			if($_FILES["ayarlar_logolight"]["tmp_name"]!=""){
				$kaynak		 = $_FILES["ayarlar_logolight"]["tmp_name"];
				$resim 		 = $_FILES["ayarlar_logolight"]["name"];
				$rtipi		 = $_FILES["ayarlar_logolight"]["type"];
				$rboyut		 = $_FILES["ayarlar_logolight"]["size"];
				$hedef 		 = "../../app/Images";
				$ayarlar_logolight=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);
				
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logolight='$ayarlar_logolight' ");			
			}elseif(p("ayarlar_logolightortam")!=""){
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logolight='".p("ayarlar_logolightortam")."' ");	
			}
			
			
			
			if($_FILES["ayarlar_logodark"]["tmp_name"]!=""){
				$kaynak		 = $_FILES["ayarlar_logodark"]["tmp_name"];
				$resim 		 = $_FILES["ayarlar_logodark"]["name"];
				$rtipi		 = $_FILES["ayarlar_logodark"]["type"];
				$rboyut		 = $_FILES["ayarlar_logodark"]["size"];
				$hedef 		 = "../../app/Images";
				$ayarlar_logodark=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);
				
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logodark='$ayarlar_logodark' ");			
			}elseif(p("ayarlar_logodarkortam")!=""){
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logodark='".p("ayarlar_logodarkortam")."' ");	
			}
			
			
			if($_FILES["ayarlar_logolightmobil"]["tmp_name"]!=""){
				$kaynak		 = $_FILES["ayarlar_logolightmobil"]["tmp_name"];
				$resim 		 = $_FILES["ayarlar_logolightmobil"]["name"];
				$rtipi		 = $_FILES["ayarlar_logolightmobil"]["type"];
				$rboyut		 = $_FILES["ayarlar_logolightmobil"]["size"];
				$hedef 		 = "../../app/Images";
				$ayarlar_logolightmobil=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);
				
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logolightmobil='$ayarlar_logolightmobil' ");			
			}elseif(p("ayarlar_logolightmobilortam")!=""){
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logolightmobil='".p("ayarlar_logolightmobilortam")."' ");	
			}
			
			
			
			if($_FILES["ayarlar_logodarkmobil"]["tmp_name"]!=""){
				$kaynak		 = $_FILES["ayarlar_logodarkmobil"]["tmp_name"];
				$resim 		 = $_FILES["ayarlar_logodarkmobil"]["name"];
				$rtipi		 = $_FILES["ayarlar_logodarkmobil"]["type"];
				$rboyut		 = $_FILES["ayarlar_logodarkmobil"]["size"];
				$hedef 		 = "../../app/Images";
				$ayarlar_logodarkmobil=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);
				
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logodarkmobil='$ayarlar_logodarkmobil' ");			
			}elseif(p("ayarlar_logodarkmobilortam")!=""){
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_logodarkmobil='".p("ayarlar_logodarkmobilortam")."' ");	
			}
			
			
			if($_FILES["ayarlar_favicon"]["tmp_name"]!=""){
				$kaynak		 = $_FILES["ayarlar_favicon"]["tmp_name"];
				$resim 		 = $_FILES["ayarlar_favicon"]["name"];
				$rtipi		 = $_FILES["ayarlar_favicon"]["type"];
				$rboyut		 = $_FILES["ayarlar_favicon"]["size"];
				$hedef 		 = "../../app/Images";
				$ayarlar_favicon=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);
				
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_favicon='$ayarlar_favicon' ");			
			}elseif(p("ayarlar_faviconortam")!=""){
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_favicon='".p("ayarlar_faviconortam")."' ");	
			}
			
			
			
			if($_FILES["ayarlar_defaultresim"]["tmp_name"]!=""){
				$kaynak		 = $_FILES["ayarlar_defaultresim"]["tmp_name"];
				$resim 		 = $_FILES["ayarlar_defaultresim"]["name"];
				$rtipi		 = $_FILES["ayarlar_defaultresim"]["type"];
				$rboyut		 = $_FILES["ayarlar_defaultresim"]["size"];
				$hedef 		 = "../../app/Images";
				$ayarlar_defaultresim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);
				
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_defaultresim='$ayarlar_defaultresim' ");			
			}elseif(p("ayarlar_defaultresimortam")!=""){
				$ekle=query("UPDATE ".prefix."_ayarlar SET ayarlar_defaultresim='".p("ayarlar_defaultresimortam")."' ");	
			}
			$json['tost'] = 'success';
			$json['mesaj'] = 'Kayıt işlemi başarılı.';
			$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
			$json['git'] = 'index.php?do=ayarlar_logo';
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}

	##-------------------------İletişim Ayarları----------------------#
	if($ickisim=="iletisim"){
		if($config["yetki"]["duzenle"]==1){
			$ayarlar_facebook=ass(p("ayarlar_facebook"));
			$ayarlar_instagram=ass(p("ayarlar_instagram"));
			$ayarlar_twitter=ass(p("ayarlar_twitter"));
			$ayarlar_youtube=ass(p("ayarlar_youtube"));
			$ayarlar_pinterest=ass(p("ayarlar_pinterest"));
			$ayarlar_linkedin=ass(p("ayarlar_linkedin"));
			$ayarlar_whatsapp=ass(p("ayarlar_whatsapp"));
			$ayarlar_telefon1=ass(p("ayarlar_telefon1"));
			$ayarlar_telefon2=ass(p("ayarlar_telefon2"));
			$ayarlar_fax=ass(p("ayarlar_fax"));
			$ayarlar_mail=ass(p("ayarlar_mail"));
			$ayarlar_mail2=ass(p("ayarlar_mail2"));
			$ayarlar_adres=ass($_POST["ayarlar_adres"]);
			$ayarlar_adres2=ass($_POST["ayarlar_adres2"]);
			$ayarlar_maplink=ass($_POST["ayarlar_maplink"]);
			$ayarlar_maplink2=ass($_POST["ayarlar_maplink2"]);
			$ayarlar_mapiframe=ass($_POST["ayarlar_mapiframe"]);
			$ayarlar_mapiframe2=ass($_POST["ayarlar_mapiframe2"]);
			

			$query="UPDATE ".prefix."_ayarlar SET 
			ayarlar_facebook='$ayarlar_facebook',
			ayarlar_instagram='$ayarlar_instagram',
			ayarlar_twitter='$ayarlar_twitter',
			ayarlar_youtube='$ayarlar_youtube',
			ayarlar_pinterest='$ayarlar_pinterest',
			ayarlar_linkedin='$ayarlar_linkedin',
			ayarlar_whatsapp='$ayarlar_whatsapp',
			ayarlar_telefon1='$ayarlar_telefon1',
			ayarlar_telefon2='$ayarlar_telefon2',
			ayarlar_fax='$ayarlar_fax',
			ayarlar_mail='$ayarlar_mail',
			ayarlar_mail2='$ayarlar_mail2',
			ayarlar_maplink='$ayarlar_maplink',
			ayarlar_maplink2='$ayarlar_maplink2',
			ayarlar_adres='$ayarlar_adres',
			ayarlar_adres2='$ayarlar_adres2',
			ayarlar_mapiframe='$ayarlar_mapiframe',
			ayarlar_mapiframe2='$ayarlar_mapiframe2'
			";
			$ekle=query($query);
			if($ekle){
				$json['tost'] = 'success';
				$json['mesaj'] = 'Kayıt işlemi başarılı.';
				$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
			}else{
				$json['tost'] = 'danger';
				$json['mesaj'] = queryalert($query);
				$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
			}
				
			
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}

	##-------------------------SMTP Ayarları----------------------#
	if($ickisim=="smtp"){
		if($config["yetki"]["duzenle"]==1){
			$ayarlar_mailhost=ass(p("ayarlar_mailhost"));
			$ayarlar_mailkadi=ass(p("ayarlar_mailkadi"));
			$ayarlar_mailparola=ass(p("ayarlar_mailparola"));
			$ayarlar_mailport=ass(p("ayarlar_mailport"));
			$ayarlar_mailssl=ass(p("ayarlar_mailssl"));
			$ayarlar_mailrecaptcha=ass(p("ayarlar_mailrecaptcha"));
			$ayarlar_recaptchaskey=ass(p("ayarlar_recaptchaskey"));
			$ayarlar_recaptchagkey=ass(p("ayarlar_recaptchagkey"));
			$ayarlar_mailgit1=ass(p("ayarlar_mailgit1"));
			$ayarlar_mailgit2=ass(p("ayarlar_mailgit2"));
			$ayarlar_mailgit3=ass(p("ayarlar_mailgit3"));
			

			$query="UPDATE ".prefix."_ayarlar SET 
			ayarlar_mailhost='$ayarlar_mailhost',
			ayarlar_mailkadi='$ayarlar_mailkadi',
			ayarlar_mailparola='$ayarlar_mailparola',
			ayarlar_mailport='$ayarlar_mailport',
			ayarlar_mailssl='$ayarlar_mailssl',
			ayarlar_mailrecaptcha='$ayarlar_mailrecaptcha',
			ayarlar_recaptchaskey='$ayarlar_recaptchaskey',
			ayarlar_recaptchagkey='$ayarlar_recaptchagkey',
			ayarlar_mailgit1='$ayarlar_mailgit1',
			ayarlar_mailgit2='$ayarlar_mailgit2',
			ayarlar_mailgit3='$ayarlar_mailgit3'
			";
			$ekle=query($query);
			if($ekle){
				$json['tost'] = 'success';
				$json['mesaj'] = 'Kayıt işlemi başarılı.';
				$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
			}else{
				$json['tost'] = 'danger';
				$json['mesaj'] = queryalert($query);
				$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
			}
				
			
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}

	##-------------------------Modül Ayarları----------------------#
	if($ickisim=="modul"){
		if($config["yetki"]["duzenle"]==1){
			$siralar = $_POST["ayarlar_sitemodulsira"];
			$moduller = $_POST["ayarlar_sitemodul"];
			$yenimodul = array();
			foreach($siralar as $key=>$deger){
				if($deger!=""){
					$yenimodul[$deger] = $moduller[$key];
				}
				
			}
			foreach($moduller as $key=>$deger){
				if($deger!=""){
					$yenimodul[$siralar[$deger]] = $moduller[$key];
				}
				
			}
			
			$ayarlar_sitemodul=serialize($yenimodul);
			

			$query="UPDATE ".prefix."_ayarlar SET 
			ayarlar_sitemodul='$ayarlar_sitemodul'
			";
			$ekle=query($query);
			if($ekle){
				$json['tost'] = 'success';
				$json['mesaj'] = 'Kayıt işlemi başarılı.';
				$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
			}else{
				$json['tost'] = 'danger';
				$json['mesaj'] = queryalert($query);
				$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
			}
				
			
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}

	##-------------------------Toplu Mail----------------------#
	if($ickisim=="toplumail"){
		if($config["yetki"]["duzenle"]==1){
			$mesaj=$_POST["mesaj"];
			$liste=p("liste");
			

			if($mesaj=="" or $liste==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				$query="INSERT INTO ".prefix."_ebultentoplu SET 
				ebultentoplu_mesaj='$mesaj',
				ebultentoplu_mailler='$liste'
				";
				$ekle=query($query);
				if($ekle){
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = 'index.php?do='.$ilkkisim.'_toplumail';
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
			}
				
			
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Toplu Mail----------------------#
	if($ickisim=="versiyonindir"){
		if($config["yetki"]["duzenle"]==1){
			include eklentiyol.'unzip/dUnzip.inc.php';
			
			$dosyalink="https://harmedya.com/ediyetisyenguncel/versiyon.zip";
			$dosya_adi = "../../app/File/versiyon.zip";
			
			unlink($dosya_adi);
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$dosyalink);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$dosya=curl_exec($ch);
			curl_close($ch);
					 
			$fp = fopen($dosya_adi,'w');
			fwrite($fp, $dosya);
			fclose($fp);
			if ($fp) { 
				$json['tost'] = 'success';
				$json['mesaj'] = 'Dosya indirildi.';
			} else { 
				$json['tost'] = 'danger';
				$json['mesaj'] = 'Dosya indirilemedi.';
			} 	
			
			$zip = new dUnzip2($dosya_adi);
			$zip->unzipAll("../../");
				
			
			unlink($dosya_adi);
			
			$sonuc = file_get_contents(siteurl."app/Bot/eksiksutunaktar.php");
			
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
		
}

echo json_encode($json);