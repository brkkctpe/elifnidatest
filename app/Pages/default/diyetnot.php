<?php
	if($config["uye"]["uye_id"]<1){
		go(url."kayit",0);
	}

	$kurallar = " blog_link='".$urlget[1]."' and";

	$kurallar = substr_replace($kurallar, '', -3);
	if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}

	$bak=query("SELECT * FROM ".prefix."_blog ".$kurallar." ");
	$no=0;
	$blogDizi = array();
	$yaz=row($bak);
	$blogDizi = $yaz;
		
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

