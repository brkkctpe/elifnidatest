<?php
if($_POST){
	
	
	$uye_mail = p("uye_mail");
	$uye_parola = p("uye_parola");
	$uye_parolam = md5(p("uye_parola"));
	
	$oku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_mail='$uye_mail'"));
	
	if($uye_mail=="" or $uye_parola==""){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen zorunlu alanları boş bırakmayın.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Lütfen zorunlu alanları boş bırakmayın.").'</div></div>';
	}elseif(!emailsorgula($uye_mail)){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen geçerli bir mail adresi yazın.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Lütfen geçerli bir mail adresi yazın").'</div></div>';
	}elseif($oku["uye_id"]==""){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Sistemde kayıtlı böy bir mail adresi yok.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Sistemde kayıtlı böy bir mail adresi yok.").'</div></div>';
	}elseif($oku["uye_parola"]!=$uye_parolam and $oku["uye_parolayeni"]!=$uye_parolam){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Lütfen parolanızı kontrol edin.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Lütfen parolanızı kontrol edin.").'</div></div>';
	}elseif($oku["uye_durum"]<1){
		$json['tost'] = 'warning';
		$json['mesaj'] = pd("Hesabınız onaylanmamış yada pasife alınmıştır.");
		$json['uyari'] = '<div class="alert alert-warning"><div class="alert-body">'.pd("Hesabınız onaylanmamış yada pasife alınmıştır.").'</div></div>';
	}else{
		if($oku["uye_parolayeni"]==$uye_parolam){
			query("UPDATE ".prefix."_uye SET uye_parola='$uye_parolam',uye_parolayeni='' WHERE uye_id='".$oku["uye_id"]."'");
		}
		$uye_key=$oku["uye_id"].md5($uye_parola); 
		$uye_key=md5($uye_key);
		
		setcookie("uye_id", $oku["uye_id"], time() + (60*60*48), "/");	
		setcookie("uye_key", $uye_key, time() + (60*60*48), "/");	
		
		$json['tost'] = 'success';
		$json['mesaj'] = pd("Giriş başarılı. Yönlendiriliyorsunuz...");
		$json['uyari'] = '<div class="alert alert-success"><div class="alert-body">'.pd("Giriş başarılı. Yönlendiriliyorsunuz...").'</div></div>';
		$json['git'] = url;
		
	}
	
}

echo json_encode($json);

?>

