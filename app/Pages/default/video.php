<?php
	
	$bak=query("SELECT * FROM ".prefix."_video
	WHERE video_durum='1' and video_dil='".paneldilid."' 
	ORDER BY video_sira ASC ");
	$videoDizi = array();
	while($yaz=row($bak)){
		$videoDizi[] = $yaz;
	}
	
	
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

