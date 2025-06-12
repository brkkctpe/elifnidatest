<?php
	
	$bak=query("SELECT * FROM ".prefix."_etkinlikler
	WHERE etkinlikler_durum='1' and etkinlikler_dil='".paneldilid."' 
	ORDER BY etkinlikler_sira ASC ");
	$etkinliklerDizi = array();
	while($yaz=row($bak)){
		$etkinliklerDizi[] = $yaz;
	}
	
	
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

