<?php

	session_destroy();
	setcookie("uye_id", "", time() - (60*60*48), "/");	
	setcookie("uye_key", "", time() - (60*60*48), "/");	
	go(url,0);
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

