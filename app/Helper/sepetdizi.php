<?php

function sepet(){
	$sepet = unserialize($_COOKIE["sepet"]);
	$kupon_kod = $_COOKIE["kupon"];
	
	##-------------------Kupon Kontrol------------------##
	$kuponOku=row(query("SELECT * FROM ".prefix."_kupon WHERE kupon_kod='$kupon_kod'"));
	$kuponDizi = array();
	if($kuponOku["kupon_durum"]<1){
		$kuponuyari = "1 ".$_COOKIE["kupon"];
		setcookie("kupon", "", time() + (60*60*24), "/");
	}else{
		
		setcookie("kupon", $kuponOku["kupon_kod"], time() + (60*60*24), "/");
		$kuponDizi = $kuponOku;		
	}
	
	$toplamfiyat = 0;
	$toplamadet = 0;
	foreach($sepet as $urun){
		$urun_id = $urun["urun"];
		$seanslar = $urun["seans"];
		
		$urunOku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_id='".$urun_id."'"));
		
		
		$sepetDizi["urunler"][] = $urunOku;
		$sepetDizi["seanslar"][] = $seanslar;
		
		$toplamfiyat = $toplamfiyat + $urunOku["urun_fiyat"];
		$toplamadet = $toplamadet + 1;
	}
	
	
	if(count($kuponDizi)>0){
		if($kuponDizi["kupon_indirim"]>0){
			$indirim = $kuponDizi["kupon_indirim"];
		}elseif($kuponDizi["kupon_yuzde"]>0){
			$indirim = ( ( $toplamfiyat / 100 ) * $kuponDizi["kupon_yuzde"] );
		}
	}
	
	$sepetDizi["kuponkod"] = $kuponDizi["kupon_kod"];
	$sepetDizi["toplamadet"] = $toplamadet;
	$sepetDizi["toplamindirim"] = $indirim;
	$sepetDizi["toplamfiyat"] = $toplamfiyat - $indirim;
	return $sepetDizi;
}

?>