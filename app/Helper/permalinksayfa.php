<?php

function permasayfa($par){
	$bak=query("SHOW TABLES");
	while($cRow = mysqli_fetch_array($bak)){
		$tableList[] = $cRow[0];
	}
	
	$oku=row(query("SELECT * FROM ".prefix."_permalink WHERE permalink_id='$par'"));
	$siteayar=row(query("SELECT * FROM ".prefix."_ayarlar"));
	$modul = unserialize($siteayar["ayarlar_sitemodul"]);
	$sayfaoku=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_id='".$oku["permalink_modulid"]."' and sayfa_permalink='".$oku["permalink_link"]."'"));
	$sayfaadi = "";
	if($sayfaoku["sayfa_permalink"]!=""){
		$sayfaadi = $sayfaoku["sayfa_adi"];
	}else{
		foreach($tableList as $mtab){
			$tablobol = explode("_",$mtab);
			$tabloadi = $tablobol[1];
			if($sayfaadi==""){
				$moduloku=row(query("SELECT * FROM ".prefix."_".$tabloadi." WHERE ".$tabloadi."_id='".$oku["permalink_modulid"]."' and ".$tabloadi."_permalink='".$oku["permalink_link"]."'"));
				$sayfaadi = $moduloku[$tabloadi."_adi"];
			}
			
		}
	}
	return $sayfaadi;
}
function permaresim($par){
	
	$oku=row(query("SELECT * FROM ".prefix."_permalink WHERE permalink_id='$par'"));
	$siteayar=row(query("SELECT * FROM ".prefix."_ayarlar"));
	$modul = unserialize($siteayar["ayarlar_sitemodul"]);
	$sayfaoku=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_id='".$oku["permalink_modulid"]."' and sayfa_permalink='".$oku["permalink_link"]."'"));
	$sayfaadi = "";
	if($sayfaoku["sayfa_permalink"]!=""){
		$sayfaadi = $sayfaoku["sayfa_resim"];
	}else{
		foreach($modul as $mtab){
			if($sayfaadi==""){
				$moduloku=row(query("SELECT * FROM ".prefix."_".$mtab." WHERE ".$mtab."_id='".$oku["permalink_modulid"]."' and ".$mtab."_permalink='".$oku["permalink_link"]."'"));
				$sayfaadi = $moduloku[$mtab."_resim"];
			}
			
		}
	}
	return $sayfaadi;
}

?>