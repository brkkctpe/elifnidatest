<?php
	
	
	$bak=query("SELECT * FROM ".prefix."_sss
	WHERE sss_durum='1' and sss_dil='".paneldilid."' 
	ORDER BY sss_sira ASC ");
	$sssDizi = array();
	while($yaz=row($bak)){
		$sssDizi[] = $yaz;
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
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

