<?php

$oku=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_permalink='".$urlget[0]."' and sayfa_dil='".paneldilid."'"));
if($oku["sayfa_dislink"]!=""){
	go($oku["sayfa_dislink"]);
}elseif($oku["sayfa_modul"]!=""){
	
	$sayfaDizi = $oku;
	
	$dosyayol = "app/Pages/".theme."/".$oku["sayfa_modul"];
	if(file_exists($dosyayol)){
		require $dosyayol;
	}
}else{
	$sayfaDizi = $oku;


	$title = ss($sayfaDizi["sayfa_adi"]);
	$desc = ss($sayfaDizi["sayfa_desc"]);
	$image = ss($sayfaDizi["sayfa_adi"])=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
}

?>