<?php
if($_POST){
	
	
	$uye_mail = p("uye_mail");
	
	$oku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_mail='$uye_mail'"));
	$uye_parolazaman = $oku["uye_parolazaman"]+(60*1);
	if($uye_mail==""){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen zorunlu alanları boş bırakmayın.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Lütfen zorunlu alanları boş bırakmayın.").'</div></div>';
	}elseif(!emailsorgula($uye_mail)){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen geçerli bir mail adresi yazın.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Lütfen geçerli bir mail adresi yazın").'</div></div>';
	}elseif($oku["uye_id"]==""){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Sistemde kayıtlı böyle bir mail adresi yok.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Sistemde kayıtlı böyle bir mail adresi yok.").'</div></div>';
	}elseif($uye_parolazaman>time()){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("İki parola isteği arasında 1 dk olmalıdır. Biraz daha bekleyin.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("İki parola isteği arasında 1 dk olmalıdır. Biraz daha bekleyin.").'</div></div>';
	}else{
		$uye_parolayeni = rand(100000,999999);
		$uye_parolayenim = md5($uye_parolayeni);
		$uye_parolazaman = time();
		
		$alici[] = $oku["uye_mail"];
		
		$mailsablon = row(query("SELECT * FROM ".prefix."_mailsablon WHERE mailsablon_durum='1' and mailsablon_alan='1'"));
		$eski = array("[uye_adsoyad]","[uye_mail]","[yeni_parola]");
		$yeni = array($oku["uye_ad"]." ".$oku["uye_soyad"],$oku["uye_mail"],$uye_parolayeni);
		$mesaj = str_replace($eski,$yeni,$mailsablon["mailsablon_aciklama"]);
		
		$sonuc = mailgonder($alici,info("sitetitle"),$mailsablon["mailsablon_adi"],$mesaj,$dosya);
		
		$query="UPDATE ".prefix."_uye SET 
		uye_parolayeni='$uye_parolayenim',
		uye_parolazaman='$uye_parolazaman'
		WHERE uye_id='".$oku["uye_id"]."' ";
		$ekle=query($query);
		if($ekle){
			$json['tost'] = 'success';
			$json['mesaj'] = pd('Mail adresinize yeni parolanızı gönderdik.');
			$json['uyari'] = '<div class="alert alert-success"><div class="alert-body">'.$uye_parolayeni.pd('Mail adresinize yeni parolanızı gönderdik.').'</div></div>';
			$json['sil'] = 1;
		}else{
			$json['tost'] = 'danger';
			$json['mesaj'] = queryalert($query);
			$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
		}
		
	}
	
}

echo json_encode($json);

?>

