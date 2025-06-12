<?php
	
	$blogOku=row(query("SELECT * FROM ".prefix."_blog WHERE blog_permalink='".$urlget[0]."'"));
	
	$bak=query("SELECT * FROM ".prefix."_blog
	WHERE blog_durum='1' and blog_dil='".paneldilid."' and blog_id!='".$urunOku["urun_id"]."' 
	ORDER BY blog_sira ASC LIMIT 0,5");
	$blogDizi = array();
	while($yaz=row($bak)){
		$blogDizi[] = $yaz;
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
	
	
	$title = $blogOku["blog_adi"]=="" ? info("sitetitle") : $blogOku["blog_adi"];
	$desc = $blogOku["blog_desc"]=="" ? info("sitedesc") : $blogOku["blog_desc"];
	$image = $blogOku["blog_resim"]=="" ? info("defaultresim") : rg($blogOku["blog_resim"]);
?>

