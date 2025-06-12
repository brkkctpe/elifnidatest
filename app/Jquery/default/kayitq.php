<?php
if($_POST){
	
	
	$uye_tc = ass(p("uye_tc"));
	$uye_ad = ass(p("uye_ad"));
	$uye_soyad = ass(p("uye_soyad"));
	$uye_mail = ass(p("uye_mail"));
	$uye_telefon = ass(p("uye_telefon"));
	$uye_parola = ass(p("uye_parola"));
	$uye_parolat = ass(p("uye_parolat"));
	$uye_parolam = md5(p("uye_parola"));
	$uye_dogumtarihi = ass(p("uye_dgun"))."/".ass(p("uye_day"))."/".ass(p("uye_dyil"));
	$uye_adres = ass(p("uye_adres"));
	$uye_il = ass(p("uye_il"));
	$uye_ilce = ass(p("uye_ilce"));
	$uye_meslek = ass(p("uye_meslek"));
	$uye_cinsiyet = ass(p("uye_cinsiyet"));
	$uye_boy = ass(p("uye_boy"));
	$uye_kilo = ass(p("uye_kilo"));
	$uye_hedefkilo = ass(p("uye_hedefkilo"));
	$uye_bildirimmail = ass(p("uye_bildirimmail"));
	$uye_bildirimsms = ass(p("uye_bildirimsms"));
	$uye_sozlesme = ass(p("sozlesme"));
	
	$oku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_mail='$uye_mail'"));
	
	if($uye_tc=="" or $uye_ad=="" or $uye_soyad=="" or $uye_mail=="" or $uye_adres=="" or $uye_cinsiyet=="" or $uye_boy==""  or $uye_kilo=="" or $uye_hedefkilo==""){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen zorunlu alanları boş bırakmayın.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Lütfen zorunlu alanları boş bırakmayın.").'</div></div>';
	}elseif(!emailsorgula($uye_mail)){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen geçerli bir mail adresi yazın.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Lütfen geçerli bir mail adresi yazın").'</div></div>';
	}elseif($oku["uye_id"]!=""){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Sistemde kayıtlı böyle bir mail adresi zaten var.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Sistemde kayıtlı böyle bir mail adresi zaten var.").'</div></div>';
	}elseif(strlen($uye_parola)<6){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Parolanız minumum 6 haneli olmalı.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Parolanız minumum 6 haneli olmalı.").'</div></div>';
	}elseif($uye_parola!=$uye_parolat){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Şifreniz tekrarı ile uyuşmuyor.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Şifreniz tekrarı ile uyuşmuyor.").'</div></div>';
	}elseif($uye_sozlesme!=1){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen üyelik ve gizlilik sözleşmesini okuyun ve onaylayın.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.$uye_sozlesme.pd("Lütfen üyelik ve gizlilik sözleşmesini okuyun ve onaylayın").'</div></div>';
	}else{
		if($_FILES["uye_resim"]["tmp_name"]!=""){
			$kaynak		 = $_FILES["uye_resim"]["tmp_name"];
			$resim 		 = $_FILES["uye_resim"]["name"];
			$rtipi		 = $_FILES["uye_resim"]["type"];
			$rboyut		 = $_FILES["uye_resim"]["size"];
			$hedef 		 = "../Images";
			$uye_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
		}
		$query="INSERT INTO ".prefix."_uye SET 
		uye_ad='$uye_ad',
		uye_soyad='$uye_soyad',
		uye_mail='$uye_mail',
		uye_telefon='$uye_telefon',
		uye_parola='$uye_parolam',
		uye_resim='$uye_resim',
		uye_tc='$uye_tc',
		uye_dogumtarihi='$uye_dogumtarihi',
		uye_adres='$uye_adres',
		uye_il='$uye_il',
		uye_ilce='$uye_ilce',
		uye_meslek='$uye_meslek',
		uye_cinsiyet='$uye_cinsiyet',
		uye_boy='$uye_boy',
		uye_kilo='$uye_kilo',
		uye_hedefkilo='$uye_hedefkilo',
		uye_bildirimmail='$uye_bildirimmail',
		uye_bildirimsms='$uye_bildirimsms',
		uye_sozlesme='$uye_sozlesme',
		uye_durum='1',
		uye_kayitzaman='".time()."'
		";
		$ekle=query($query);
		if($ekle){
			
			
			$oku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_mail='$uye_mail'"));
			// $alici[] = $oku["uye_mail"];
			
			// $icerik = "Sayın [uye_adsoyad]; aramıza hoşgeldiniz.";
			// $eski = array("[uye_adsoyad]","[uye_mail]","[yeni_parola]");
			// $yeni = array($oku["uye_ad"]." ".$oku["uye_soyad"],$oku["uye_mail"],$uye_parolayeni);
			// $mesaj = str_replace($eski,$yeni,$mailsablon["mailsablon_aciklama"]);
			
			// $sonuc = mailgonder($alici,info("sitetitle"),$mailsablon["mailsablon_adi"],$mesaj,$dosya);
			
			$mesaj = "Sayın ".$oku["uye_ad"]." ".$oku["uye_soyad"]." aramıza hoşgeldiniz.";
			$mesaj = "En Saglikli Beslenme Danismanligi'na hos geldiniz. Web sitemize giris yaparak, urunlerimize ve saglikli beslenme hakkindaki tum bilgilere ulasabilirsiniz. www.elifnidazafer.com";
			$telefon = preg_replace('/\D/', '', $uye_telefon);
			smsgonder($telefon, $mesaj);
			
			$json['tost'] = 'success';
			$json['mesaj'] = pd('Kayıt işlemi başarılı. Giriş yapabilirsiniz.');
			$json['uyari'] = '<div class="alert alert-success"><div class="alert-body">'.pd('Kayıt işlemi başarılı. Giriş yapabilirsiniz.').'</div></div>';
			$json['git'] = url.ld("giris");
		}else{
			$json['tost'] = 'danger';
			$json['mesaj'] = queryalert($query);
			$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
		}
		
	}
	
}

echo json_encode($json);

?>

