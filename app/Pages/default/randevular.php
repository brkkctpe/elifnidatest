<?php
	if($config["uye"]["uye_id"]<1){
		go(url."giris",0);
	}
	if($urlget[1]!=""){
		$sepet=query("SELECT * FROM ".prefix."_sepet 
		WHERE sepet_id='".$urlget[1]."' and sepet_uye='".$config["uye"]["uye_id"]."' and sepet_odemedurum='1' ");
	}else{
		$sepet=query("SELECT * FROM ".prefix."_sepet 
		WHERE sepet_uye='".$config["uye"]["uye_id"]."' and sepet_odemedurum='1' ");
	}
	
	while($yaz=row($sepet)){
		$sepetId[] = $yaz["sepet_id"];
	}
	$sepetler = @implode(",",$sepetId);
	#----------------Randevular---------------------#
	$kurallar = "randevu_sepet IN(".$sepetler.") and randevu_zaman>".time()." and";

	$kurallar = substr_replace($kurallar, '', -3);
	if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

	$sayfa = g("s") ? g("s") : 1;
	$ksayisi=rows(query("SELECT * FROM ".prefix."_randevu ".$kurallar));
	$limit=20;
	$ssayisi=ceil($ksayisi/$limit);
	$baslangic=($sayfa*$limit)-$limit;
	
	$bak=query("SELECT * FROM ".prefix."_randevu ".$kurallar."
	ORDER BY randevu_zaman ASC LIMIT $baslangic,$limit");
	$randevuDizi=array();
	$no=0;
	while($yaz=row($bak)){
		
		$oku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_id='".$yaz["randevu_tur"]."' "));
		
		$randevuDizi[$no]["randevu_id"] = ss($yaz["randevu_id"]);
		$randevuDizi[$no]["urun_adi"] = ss($oku["urun_adi"]);
		$randevuDizi[$no]["urun_fiyat"] = ss($oku["urun_fiyat"]);
		$randevuDizi[$no]["urun_toplamseans"] = ss($oku["urun_toplamseans"]);
		$randevuDizi[$no]["urun_haftaseans"] = ss($oku["urun_haftaseans"]);
		$randevuDizi[$no]["randevu_zaman"] = date("d.m.Y H:i",$yaz["randevu_zaman"]);
		$no++;
	}
	
	$bak=query("SELECT * FROM ".prefix."_randevu 
	WHERE randevu_sepet IN(".$sepetler.")
	ORDER BY randevu_zaman DESC ");
	$randevuDizitakvim=array();
	$no=0;
	while($yaz=row($bak)){
		
		$oku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_id='".$yaz["randevu_tur"]."' "));
		
		$randevuDizitakvim[$no]["randevu_id"] = ss($yaz["randevu_id"]);
		$randevuDizitakvim[$no]["urun_adi"] = ss($oku["urun_adi"]);
		$randevuDizitakvim[$no]["urun_fiyat"] = ss($oku["urun_fiyat"]);
		$randevuDizitakvim[$no]["urun_toplamseans"] = ss($oku["urun_toplamseans"]);
		$randevuDizitakvim[$no]["urun_haftaseans"] = ss($oku["urun_haftaseans"]);
		$randevuDizitakvim[$no]["randevu_zaman"] = date("d.m.Y H:i",$yaz["randevu_zaman"]);
		$no++;
	}	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

