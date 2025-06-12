<?php
	

	$bak=query("SELECT * FROM ".prefix."_tarifler
	WHERE tarifler_durum='1' and tarifler_dil='".paneldilid."' 
	ORDER BY tarifler_sira ASC ");
	$tariflerDizi = array();
	while($yaz=row($bak)){
		$tariflerDizi[] = $yaz;
	}

	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
	
	
	
	
?>

