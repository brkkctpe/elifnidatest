<?php

if($_POST){
	$yonetici_mail = p("yonetici_mail");
	$yonetici_parola = p("yonetici_parola");
	
	$bak=query("SELECT * FROM ".prefix."_yonetici WHERE yonetici_mail='$yonetici_mail'");
	$yaz=row($bak);
	if(rows($bak)<1){
		$json['uyari'] = '<div class="alert alert-warning">Sisteme kayıtlı böyle bir mail adresi yok</div>';
	}elseif($yonetici_parola==""){
		$json['uyari'] = '<div class="alert alert-warning">Parola boş bırakılamaz</div>';
	}elseif($yaz["yonetici_durum"]==0){
		$json['uyari'] = '<div class="alert alert-warning">Panele giriş yetkiniz bulunmuyor</div>';
	}elseif($yaz["yonetici_parola"]!=md5($yonetici_parola)){
		$json['uyari'] = '<div class="alert alert-warning">Lütfen parolanızı kontrol edin</div>';
	}else{
		$yonetici_key=$yaz["yonetici_id"].md5($yonetici_parola); 
		$yonetici_key=md5($yonetici_key);
		
		setcookie("yonetici_id", $yaz["yonetici_id"], time() + (60*60*3), "/");	
		setcookie("yonetici_key", $yonetici_key, time() + (60*60*3), "/");	
		
		$json['git'] = siteurl."admin";
		$json['uyari'] = '<div class="alert alert-success">Giriş başarılı</div>';
		logekle($yaz["yonetici_ad"].' panele giriş yaptı.');
	}
	
}

echo json_encode($json);