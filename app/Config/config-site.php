<?php

##----------------------------Ayarlar--------------------##
$siteayar = row(query("SELECT * FROM ".prefix."_ayarlar"));
$config["ayar"] = $siteayar;


$bak=query("SHOW TABLES");
while($cRow = mysqli_fetch_array($bak)){
    $tableList[] = $cRow[0];
}

##----------------------------Diller--------------------##
$bak=query("SELECT * FROM ".prefix."_dil WHERE dil_durum='1'");
$diller = array();
while($yaz=row($bak)){
	$diller[$yaz["dil_id"]] = $yaz;
	$diluzanti[] = $yaz["dil_uzanti"];
} 

## Panel Dili ##
if($_COOKIE["dil"]!=""){
	define('paneldil',$_COOKIE["dil"]);	
}else{
	define('paneldil',$diller[$siteayar["ayarlar_sitedil"]]["dil_uzanti"]);	
} 

$diloku=row(query("SELECT * FROM ".prefix."_dil WHERE dil_uzanti='".paneldil."' "));
if($diloku["dil_id"]>0){
	define('paneldilid',$diloku["dil_id"]);	
}else{
	define('paneldilid',$diloku["dil_id"]);	
}

if(count($diller)>1){
	define("url",siteurl.paneldil."/"); ##Sonuna / koyun
}else{
	define("url",siteurl); ##Sonuna / koyun
}


##----------------------------Yönetici İşlemleri--------------------##
$yonetici_id=$_COOKIE["yonetici_id"];
$yonetici_key=$_COOKIE["yonetici_key"];
$yoneticiOku=row(query("SELECT * FROM ".prefix."_yonetici WHERE yonetici_id='$yonetici_id'"));
$yonetici_anahtar = md5($yoneticiOku["yonetici_id"].$yoneticiOku["yonetici_parola"]);
if($yonetici_key!=$yonetici_anahtar){
	setcookie("yonetici_id", "", time() - (60*60*3), "/");	
	setcookie("yonetici_key", "", time() - (60*60*3), "/");	
}else{
	setcookie("yonetici_id", $yonetici_id, time() + (60*60*3), "/");	
	setcookie("yonetici_key", $yonetici_key, time() + (60*60*3), "/");	
	
	if($yoneticiOku["yonetici_ekip"]>0){
		$ekipOku=row(query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_id='".$yoneticiOku["yonetici_ekip"]."'"));
		$config["yetki"]["ekle"] = $ekipOku["rutbe_ekle"];
		$config["yetki"]["duzenle"] = $ekipOku["rutbe_duzenle"];
		$config["yetki"]["sil"] = $ekipOku["rutbe_sil"];
		$config["yetki"]["sayfa"] = unserialize($ekipOku["rutbe_sayfa"]);
	}else{
		$ekipOku=row(query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_id='".$yoneticiOku["yonetici_ekip"]."'"));
		$config["yetki"]["ekle"] = 1;
		$config["yetki"]["duzenle"] = 1;
		$config["yetki"]["sil"] = 1;
		$config["yetki"]["sayfa"] = unserialize($ekipOku["rutbe_sayfa"]);
	}
	
	$config["yonetici"] = $yoneticiOku;
}

##----------------------------Üye İşlemleri--------------------##
$uye_id=$_COOKIE["uye_id"];
$uye_key=$_COOKIE["uye_key"];
$uyeOku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_id='$uye_id'"));
$uye_anahtar = md5($uyeOku["uye_id"].$uyeOku["uye_parola"]);
if($uye_key!=$uye_anahtar){
	setcookie("uye_id", "", time() - (60*60*3), "/");	
	setcookie("uye_key", "", time() - (60*60*3), "/");	
}else{
	$config["uye"] = $uyeOku;
}



define("theme",$config["ayar"]["ayarlar_sitetema"]);
define('themeurl', 'app/Themes/'.theme);
define('thumbnailyol',url.'app/Addition/');
define('eklentiyol',$_SERVER['DOCUMENT_ROOT'].sitedizin.'/app/Addition/');


//-------Mail Ayarları--------------
define('mailhost',$siteayar["ayarlar_mailhost"]);
define('mailport',$siteayar["ayarlar_mailport"]);
define('mailssl',$siteayar["ayarlar_mailssl"]);
define('mailusername',$siteayar["ayarlar_mailkadi"]);
define('mailpassword',$siteayar["ayarlar_mailparola"]);
define('mailad',$_SERVER['SERVER_NAME']);

//-------İyzico--------------
define('iyzico_api_key',vsc($siteayar["ayarlar_iyzico_api_key"]));
define('iyzico_api_secret',vsc($siteayar["ayarlar_iyzico_api_secret"]));
define('iyzico_base_url',vsc($siteayar["ayarlar_iyzico_base_url"]));


function pd($par){
	$dbak = query("SELECT * FROM ".prefix."_diltext WHERE diltext_default='$par'");
	$dsay = rows($dbak);
	if($dsay>0){
		$doku = row($dbak);
		$dcevir = unserialize($doku["diltext_ceviri"]);
		if($dcevir[paneldilid]!=""){
			$eski = array("&lt;","&gt;",'&quot;');
			$yeni = array("<",">",'"');
			$dcevir = str_replace($eski,$yeni,$dcevir[paneldilid]);
			return $dcevir;
		}else{
			return $par;
		}
	}else{
		return $par;
	}	
}

function ld($par){
	$bak=query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$par' and permalink_dil='".paneldilid."'");
	if(rows($bak)>0){
		$oku=row($bak);
		return $oku["permalink_git"];
	}else{
		return $par;
	}
	
}


// $bak = query("SELECT * FROM ".prefix."_permalink");
// while($yaz=row($bak)){
	// $adi = permasayfa($yaz["permalink_id"]);
	// query("UPDATE ".prefix."_permalink SET permalink_adi='$adi' WHERE permalink_id='".$yaz["permalink_id"]."'");
// }