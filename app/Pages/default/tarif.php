<?php
	
	$tariflerOku=row(query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_permalink='".$urlget[0]."'"));
	
	$bak=query("SELECT * FROM ".prefix."_tarifler
	WHERE tarifler_durum='1' and tarifler_dil='".paneldilid."' and tarifler_id!='".$urunOku["urun_id"]."' 
	ORDER BY tarifler_sira ASC LIMIT 0,5");
	$tariflerDizi = array();
	while($yaz=row($bak)){
		$tariflerDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_referans
	WHERE referans_durum='1' and referans_anasayfa='1' and referans_dil='".paneldilid."' 
	ORDER BY referans_sira ASC ");
	$referansDizi = array();
	while($yaz=row($bak)){
		$referansDizi[] = $yaz;
	}	
	
	$bak=query("SELECT * FROM ".prefix."_fotografgaleri
	WHERE fotografgaleri_durum='1' and fotografgaleri_anasayfa='1' and fotografgaleri_dil='".paneldilid."' 
	ORDER BY fotografgaleri_sira ASC ");
	$fotografgaleriDizi = array();
	while($yaz=row($bak)){
		$fotografgaleriDizi[] = $yaz;
	}	
	
	
	$title = $tariflerOku["tarifler_adi"]=="" ? info("sitetitle") : $tariflerOku["tarifler_adi"];
	$desc = $tariflerOku["tarifler_desc"]=="" ? info("sitedesc") : $tariflerOku["tarifler_desc"];
	$image = $tariflerOku["tarifler_resim"]=="" ? info("defaultresim") : rg($tariflerOku["tarifler_resim"]);
?>

