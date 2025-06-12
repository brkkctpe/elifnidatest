<?php
	
	$bak=query("SELECT * FROM ".prefix."_oduller
	WHERE oduller_durum='1' and oduller_dil='".paneldilid."' 
	ORDER BY oduller_sira ASC ");
	$odullerDizi = array();
	while($yaz=row($bak)){
		$odullerDizi[] = $yaz;
	}
	
	
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

