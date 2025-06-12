<?php
	
	$urunOku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_permalink='".$urlget[1]."'"));
	
	$bak=query("SELECT * FROM ".prefix."_urun
	WHERE urun_durum='1' and urun_dil='".paneldilid."' and urun_id!='".$urunOku["urun_id"]."' 
	ORDER BY urun_sira ASC LIMIT 0,3");
	$urunDizi = array();
	while($yaz=row($bak)){
		$urunDizi[] = $yaz;
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
	
	$gunler = array(
	1=>"Pazartesi",
	2=>"Salı",
	3=>"Çarşamba",
	4=>"Perşembe",
	5=>"Cuma",
	6=>"Cumartesi",
	7=>"Pazar"
	);
	
	$title = $urunOku["urun_adi"]=="" ? info("sitetitle") : $urunOku["urun_adi"];
	$desc = $urunOku["urun_desc"]=="" ? info("sitedesc") : $urunOku["urun_desc"];
	$image = $urunOku["urun_resim"]=="" ? info("defaultresim") : rg($urunOku["urun_resim"]);
?>

