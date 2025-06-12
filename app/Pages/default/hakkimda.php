<?php
	

	$bak=query("SELECT * FROM ".prefix."_urunkategori
	WHERE urunkategori_durum='1' and urunkategori_anasayfa='1' and urunkategori_dil='".paneldilid."' 
	ORDER BY urunkategori_sira ASC ");
	$urunkategoriDizi = array();
	while($yaz=row($bak)){
		$urunkategoriDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_urunkategori
	WHERE urunkategori_durum='1' and urunkategori_anasayfa!='1' and urunkategori_dil='".paneldilid."' 
	ORDER BY urunkategori_sira ASC ");
	$urunkategoriDizi2 = array();
	while($yaz=row($bak)){
		$urunkategoriDizi2[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_referans
	WHERE referans_durum='1' and referans_anasayfa='1' and referans_dil='".paneldilid."' 
	ORDER BY referans_sira ASC ");
	$referansDizi = array();
	while($yaz=row($bak)){
		$referansDizi[] = $yaz;
	}
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

