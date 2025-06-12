<?php
	
	$kategoriOku=row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_permalink='".$urlget[0]."'"));

	if($kategoriOku["urunkategori_id"]>0){
		$bak=query("SELECT * FROM ".prefix."_urun
		WHERE urun_durum='1' and urun_kategori='".$kategoriOku["urunkategori_id"]."' and urun_seans!='0' and urun_dil='".paneldilid."' 
		ORDER BY urun_sira ASC ");
		$urunDizi = array();
		while($yaz=row($bak)){
			$urunDizi[] = $yaz;
		}
	
		$title = $kategoriOku["urunkategori_adi"]=="" ? info("sitetitle") : $kategoriOku["urunkategori_adi"];
		$desc = $kategoriOku["urunkategori_desc"]=="" ? info("sitedesc") : $kategoriOku["urunkategori_desc"];
		$image = $kategoriOku["urunkategori_resim"]=="" ? info("defaultresim") : rg($kategoriOku["urunkategori_resim"]);
	}else{
		$bak=query("SELECT * FROM ".prefix."_urunkategori
		WHERE urunkategori_durum='1' and urunkategori_dil='".paneldilid."' 
		ORDER BY urunkategori_sira ASC ");
		$urunkategoriDizi = array();
		while($yaz=row($bak)){
			$urunkategoriDizi[] = $yaz;
		}
	
		$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
		$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
		$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
	}
	
	
	
?>

