<?php
	
	$hesapOku=row(query("SELECT * FROM ".prefix."_hesap WHERE hesap_permalink='".$urlget[0]."'"));
	
	
	
	$title = $hesapOku["hesap_adi"]=="" ? info("sitetitle") : $hesapOku["hesap_adi"];
	$desc = $hesapOku["hesap_desc"]=="" ? info("sitedesc") : $hesapOku["hesap_desc"];
	$image = $hesapOku["hesap_resim"]=="" ? info("defaultresim") : rg($hesapOku["hesap_resim"]);
?>

