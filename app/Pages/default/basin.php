<?php
	

	$bak=query("SELECT * FROM ".prefix."_basin
	WHERE basin_durum='1' and basin_dil='".paneldilid."'
	ORDER BY basin_sira ASC ");
	$basinDizi = array();
	while($yaz=row($bak)){
		$basinDizi[] = $yaz;
	}
	
	
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

