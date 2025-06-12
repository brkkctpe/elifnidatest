<?php
	
	$urunOku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_permalink='".$urlget[0]."'"));
	
	$bak=query("SELECT * FROM ".prefix."_urun
	WHERE urun_durum='1' and urun_kategori='".$urunOku["urun_kategori"]."' and urun_seans!='0' and urun_dil='".paneldilid."' 
	ORDER BY urun_sira ASC ");
	$urunDizi = array();
	while($yaz=row($bak)){
		$urunDizi[] = $yaz;
	}	
	
	$bak=query("SELECT * FROM ".prefix."_sss
	WHERE sss_durum='1' and sss_anasayfa='1' and sss_dil='".paneldilid."' 
	ORDER BY sss_sira ASC ");
	$sssDizi = array();
	while($yaz=row($bak)){
		$sssDizi[] = $yaz;
	}
	
	
	$title = $urunOku["urun_adi"]=="" ? info("sitetitle") : $urunOku["urun_adi"];
	$desc = $urunOku["urun_desc"]=="" ? info("sitedesc") : $urunOku["urun_desc"];
	$image = $urunOku["urun_resim"]=="" ? info("defaultresim") : rg($urunOku["urun_resim"]);
?>

