<?php
	if($config["uye"]["uye_id"]<1){
		go(url."kayit",0);
	}
	
	$bak=query("SELECT * FROM ".prefix."_randevu
	INNER JOIN ".prefix."_urun ON ".prefix."_urun.urun_id = ".prefix."_randevu.randevu_tur
	INNER JOIN ".prefix."_sepet ON ".prefix."_sepet.sepet_id = ".prefix."_randevu.randevu_sepet
	WHERE sepet_odemedurum='1' and randevu_uye='".$config["uye"]["uye_id"]."' and randevu_seans='0'");
	$urunDizi = array();
	$no=0;
	while($yaz=row($bak)){
		$urunDizi[$no]["urun_id"] = ss($yaz["urun_id"]);
		$urunDizi[$no]["urun_adi"] = ss($yaz["urun_adi"]);
		$no++;
	}
	
	$bak=query("SELECT * FROM ".prefix."_uyediyet
	WHERE uyediyet_uye='".$config["uye"]["uye_id"]."' ORDER BY uyediyet_id DESC" );
	$diyetlerDizi = array();
	$no=0;
	while($yaz=row($bak)){
		$diyetlerDizi[$no]["uyediyet_id"] = ss($yaz["uyediyet_id"]);
		$diyetlerDizi[$no]["uyediyet_adi"] = ss($yaz["uyediyet_adi"]);
		$no++;
	}
	
	if($urlget[1]!=""){		
		$yaz=row(query("SELECT * FROM ".prefix."_uyediyet 
		WHERE uyediyet_uye='".$config["uye"]["uye_id"]."' and uyediyet_id='".$urlget[1]."' ORDER BY uyediyet_id DESC LIMIT 0,1"));
	}else{
		$yaz=row(query("SELECT * FROM ".prefix."_uyediyet 
		WHERE uyediyet_uye='".$config["uye"]["uye_id"]."' ORDER BY uyediyet_id DESC LIMIT 0,1"));
	}
	
	$diyetDizi=array();	
	
	$diyetDizi["uyediyet_adi"] = ss($yaz["uyediyet_adi"]);
	$diyetDizi["uyediyet_aciklama"] = ss($yaz["uyediyet_aciklama"]);
	$diyetDizi["uyediyet_detay"] = unserialize($yaz["uyediyet_detay"]);
	$diyetDizi["uyediyet_notlar"] = @implode(",",unserialize($yaz["uyediyet_notlar"]));
	
	$kurallar = "blog_tip='1' and blog_id IN(".$diyetDizi["uyediyet_notlar"].") and";

	$kurallar = substr_replace($kurallar, '', -3);
	if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

	$bak=query("SELECT * FROM ".prefix."_blog ".$kurallar." 
	ORDER BY blog_id DESC ");
	$no=0;
	$blogDizi = array();
	while($yaz=row($bak)){
		$blogDizi[] = $yaz;
	$no++;	
	}		
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

