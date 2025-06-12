<?php
	if($config["uye"]["uye_id"]<1){
		go(url."kayit",0);
	}
	
	$bak=query("SELECT * FROM ".prefix."_randevu
	INNER JOIN ".prefix."_urun ON ".prefix."_urun.urun_id = ".prefix."_randevu.randevu_tur
	INNER JOIN ".prefix."_sepet ON ".prefix."_sepet.sepet_id = ".prefix."_randevu.randevu_sepet
	WHERE sepet_odemedurum='1' and randevu_uye='".$config["uye"]["uye_id"]."' and randevu_seans='0' and urun_id='".$urlget[1]."'");
	$urunDizi = array();
	$yaz=row($bak);
	$urunDizi["urun_id"] = ss($yaz["urun_id"]);
	$urunDizi["urun_adi"] = ss($yaz["urun_adi"]);
	$urunDizi["urun_aciklama"] = ss($yaz["urun_aciklama"]);

	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

