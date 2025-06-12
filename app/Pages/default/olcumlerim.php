<?php
	if($config["uye"]["uye_id"]<1){
		go(url."kayit",0);
	}
	
	#----------------Ölçümlerim---------------------#
	$kurallar = "olcum_uye='".$config["uye"]["uye_id"]."' and";

	$kurallar = substr_replace($kurallar, '', -3);
	if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

	$sayfa = g("s") ? g("s") : 1;
	$ksayisi=rows(query("SELECT * FROM ".prefix."_olcum ".$kurallar));
	$limit=10;
	$ssayisi=ceil($ksayisi/$limit);
	$baslangic=($sayfa*$limit)-$limit;
	$link = url.$urlget[0];	
	
	$bak=query("SELECT * FROM ".prefix."_olcum WHERE olcum_uye='".$config["uye"]["uye_id"]."'
	ORDER BY olcum_id DESC LIMIT $baslangic,$limit");
	$olcumDizi=array();
	$no=0;
	while($yaz=row($bak)){
		$olcumDizi[$no]["olcum_id"] = ss($yaz["olcum_id"]);
		$olcumDizi[$no]["olcum_tarih"] = ss($yaz["olcum_tarih"]);
		$olcumDizi[$no]["olcum_agirlik"] = ss($yaz["olcum_agirlik"]);
		$olcumDizi[$no]["olcum_bel"] = ss($yaz["olcum_bel"]);
		$olcumDizi[$no]["olcum_gobek"] = ss($yaz["olcum_gobek"]);
		$olcumDizi[$no]["olcum_ustkol"] = ss($yaz["olcum_ustkol"]);
		$olcumDizi[$no]["olcum_ustbacak"] = ss($yaz["olcum_ustbacak"]);
		$olcumDizi[$no]["olcum_kalca"] = ss($yaz["olcum_kalca"]);
		$olcumDizi[$no]["olcum_gogus"] = ss($yaz["olcum_gogus"]);
		$olcumDizi[$no]["olcum_boyun"] = ss($yaz["olcum_boyun"]);
		$olcumDizi[$no]["olcum_odem"] = ss($yaz["olcum_odem"]);
		$olcumDizi[$no]["olcum_kabizlik"] = ss($yaz["olcum_kabizlik"]);
		$olcumDizi[$no]["olcum_regloncesi"] = ss($yaz["olcum_regloncesi"]);
		$olcumDizi[$no]["olcum_reglsonrasi"] = ss($yaz["olcum_reglsonrasi"]);
		$olcumDizi[$no]["olcum_uyum"] = ss($yaz["olcum_uyum"]);
		$olcumDizi[$no]["olcum_egzersiz"] = ss($yaz["olcum_egzersiz"]);
		$olcumDizi[$no]["olcum_mesaj"] = ss($yaz["olcum_mesaj"]);
		$no++;
	}
	

	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

