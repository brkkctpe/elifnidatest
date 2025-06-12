<?php
	if($config["uye"]["uye_id"]<1){
		go(url."kayit",0);
	}
	$bak=query("SELECT * FROM ".prefix."_olcum WHERE olcum_uye='".$config["uye"]["uye_id"]."' and olcum_id='".$urlget[1]."'");
	if(rows($bak)<1){
		go(url."olcumlerim",0);
	}	
	
	$olcumDizi=array();

	$yaz=row($bak);
	$olcumDizi["olcum_id"] = ss($yaz["olcum_id"]);
	$olcumDizi["olcum_tarih"] = ss($yaz["olcum_tarih"]);
	$olcumDizi["olcum_resim"] = ss($yaz["olcum_resim"]);
	$olcumDizi["olcum_agirlik"] = ss($yaz["olcum_agirlik"]);
	$olcumDizi["olcum_bel"] = ss($yaz["olcum_bel"]);
	$olcumDizi["olcum_gobek"] = ss($yaz["olcum_gobek"]);
	$olcumDizi["olcum_ustkol"] = ss($yaz["olcum_ustkol"]);
	$olcumDizi["olcum_ustbacak"] = ss($yaz["olcum_ustbacak"]);
	$olcumDizi["olcum_kalca"] = ss($yaz["olcum_kalca"]);
	$olcumDizi["olcum_gogus"] = ss($yaz["olcum_gogus"]);
	$olcumDizi["olcum_boyun"] = ss($yaz["olcum_boyun"]);
	$olcumDizi["olcum_odem"] = ss($yaz["olcum_odem"]);
	$olcumDizi["olcum_kabizlik"] = ss($yaz["olcum_kabizlik"]);
	$olcumDizi["olcum_regloncesi"] = ss($yaz["olcum_regloncesi"]);
	$olcumDizi["olcum_reglsonrasi"] = ss($yaz["olcum_reglsonrasi"]);
	$olcumDizi["olcum_uyum"] = ss($yaz["olcum_uyum"]);
	$olcumDizi["olcum_egzersiz"] = ss($yaz["olcum_egzersiz"]);
	$olcumDizi["olcum_mesaj"] = ss($yaz["olcum_mesaj"]);
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

