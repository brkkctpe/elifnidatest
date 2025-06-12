<?php
	if($config["uye"]["uye_id"]<1){
		go(url."kayit",0);
	}
	
	#----------------Randevular---------------------#
	$kurallar = "sepet_uye='".$config["uye"]["uye_id"]."' and sepet_odemedurum='1' and";

	$kurallar = substr_replace($kurallar, '', -3);
	if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

	$sayfa = g("s") ? g("s") : 1;
	$ksayisi=rows(query("SELECT * FROM ".prefix."_sepet ".$kurallar));
	$limit=10;
	$ssayisi=ceil($ksayisi/$limit);
	$baslangic=($sayfa*$limit)-$limit;
	$link = url.$urlget[0];	
	
	$bak=query("SELECT * FROM ".prefix."_sepet ".$kurallar."
	ORDER BY sepet_id DESC LIMIT $baslangic,$limit");
	$sepetDizi=array();
	$no=0;
	while($yaz=row($bak)){
		
		$oku=row(query("SELECT * FROM ".prefix."_urun 
		INNER JOIN ".prefix."_paketler ON ".prefix."_paketler.paket_id = ".prefix."_urun.urun_kategori
		WHERE urun_id='".$yaz["sepet_urun"]."' "));
		
		$sepetDizi[$no]["sepet_id"] = ss($yaz["sepet_id"]);
		$sepetDizi[$no]["sepet_fiyat"] = ss($yaz["sepet_tutar"]);
		$sepetDizi[$no]["sepet_kayitzaman"] = date("d.m.Y H:i",$yaz["sepet_kayitzaman"]);
		$sepetDizi[$no]["urun_baslik"] = ss($oku["urun_baslik"]);
		$sepetDizi[$no]["urun_fiyat"] = ss($oku["urun_fiyat"]);
		$sepetDizi[$no]["urun_toplamseans"] = ss($oku["urun_toplamseans"]);
		$sepetDizi[$no]["urun_haftaseans"] = ss($oku["urun_haftaseans"]);
		$no++;
	}
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

