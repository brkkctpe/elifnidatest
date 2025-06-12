<?php
	
	$bak=query("SELECT * FROM ".prefix."_referans
	WHERE referans_durum='1' and referans_dil='".paneldilid."' 
	ORDER BY referans_sira ASC ");
	$referansDizi = array();
	while($yaz=row($bak)){
		$referansDizi[] = $yaz;
	}
	
	
	$bak=query("SELECT * FROM ".prefix."_urun
	WHERE urun_durum='1' and urun_anasayfa='1' and urun_dil='".paneldilid."' 
	ORDER BY urun_sira ASC ");
	$urunDizi = array();
	while($yaz=row($bak)){
		$urunDizi[] = $yaz;
	}
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

