<?php
	
	$bak=query("SELECT * FROM ".prefix."_asama 
	WHERE asama_durum='1' and asama_anasayfa='1' and asama_dil='".paneldilid."' 
	ORDER BY asama_sira ASC ");
	$asamaDizi = array();
	while($yaz=row($bak)){
		$asamaDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_bayiler
	WHERE bayiler_durum='1' and bayiler_anasayfa='1' and bayiler_dil='".paneldilid."' 
	ORDER BY bayiler_sira ASC ");
	$bayilerDizi = array();
	while($yaz=row($bak)){
		$bayilerDizi[] = $yaz;
	}

	$bak=query("SELECT * FROM ".prefix."_belgeler
	WHERE belgeler_durum='1' and belgeler_anasayfa='1' and belgeler_dil='".paneldilid."' 
	ORDER BY belgeler_sira ASC ");
	$belgelerDizi = array();
	while($yaz=row($bak)){
		$belgelerDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_blog
	WHERE blog_durum='1' and blog_anasayfa='1' and blog_dil='".paneldilid."' 
	ORDER BY blog_sira ASC ");
	$blogDizi = array();
	while($yaz=row($bak)){
		$blogDizi[] = $yaz;
	}

	$bak=query("SELECT * FROM ".prefix."_blogkategori
	WHERE blogkategori_durum='1' and blogkategori_anasayfa='1' and blogkategori_dil='".paneldilid."' 
	ORDER BY blogkategori_sira ASC ");
	$blogkategoriDizi = array();
	while($yaz=row($bak)){
		$blogkategoriDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_fotografgaleri
	WHERE fotografgaleri_durum='1' and fotografgaleri_anasayfa='1' and fotografgaleri_dil='".paneldilid."' 
	ORDER BY fotografgaleri_sira ASC ");
	$fotografgaleriDizi = array();
	while($yaz=row($bak)){
		$fotografgaleriDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_hizmetler
	WHERE hizmetler_durum='1' and hizmetler_anasayfa='1' and hizmetler_dil='".paneldilid."' 
	ORDER BY hizmetler_sira ASC ");
	$hizmetlerDizi = array();
	while($yaz=row($bak)){
		$hizmetlerDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_markalar
	WHERE markalar_durum='1' and markalar_anasayfa='1' and markalar_dil='".paneldilid."' 
	ORDER BY markalar_sira ASC ");
	$markalarDizi = array();
	while($yaz=row($bak)){
		$markalarDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_partner
	WHERE partner_durum='1' and partner_anasayfa='1' and partner_dil='".paneldilid."' 
	ORDER BY partner_sira ASC ");
	$partnerDizi = array();
	while($yaz=row($bak)){
		$partnerDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_proje
	WHERE proje_durum='1' and proje_anasayfa='1' and proje_dil='".paneldilid."' 
	ORDER BY proje_sira ASC ");
	$projeDizi = array();
	while($yaz=row($bak)){
		$projeDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_referans
	WHERE referans_durum='1' and referans_anasayfa='1' and referans_dil='".paneldilid."' 
	ORDER BY referans_sira ASC ");
	$referansDizi = array();
	while($yaz=row($bak)){
		$referansDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_slider
	WHERE slider_durum='1' and slider_anasayfa='1' and slider_dil='".paneldilid."' 
	ORDER BY slider_sira ASC ");
	$sliderDizi = array();
	while($yaz=row($bak)){
		$sliderDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_sss
	WHERE sss_durum='1' and sss_anasayfa='1' and sss_dil='".paneldilid."' 
	ORDER BY sss_sira ASC ");
	$sssDizi = array();
	while($yaz=row($bak)){
		$sssDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_urun
	WHERE urun_durum='1' and urun_anasayfa='1' and urun_dil='".paneldilid."' 
	ORDER BY urun_sira ASC ");
	$urunDizi = array();
	while($yaz=row($bak)){
		$urunDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_urunkategori
	WHERE urunkategori_durum='1' and urunkategori_anasayfa='1' and urunkategori_dil='".paneldilid."' 
	ORDER BY urunkategori_sira ASC ");
	$urunkategoriDizi = array();
	while($yaz=row($bak)){
		$urunkategoriDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_urunkategori
	WHERE urunkategori_durum='1' and urunkategori_anasayfa!='1' and urunkategori_dil='".paneldilid."' 
	ORDER BY urunkategori_sira ASC ");
	$urunkategoriDizi2 = array();
	while($yaz=row($bak)){
		$urunkategoriDizi2[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_video
	WHERE video_durum='1' and video_anasayfa='1' and video_dil='".paneldilid."' 
	ORDER BY video_sira ASC ");
	$videoDizi = array();
	while($yaz=row($bak)){
		$videoDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_videokategori
	WHERE videokategori_durum='1' and videokategori_anasayfa='1' and videokategori_dil='".paneldilid."' 
	ORDER BY videokategori_sira ASC ");
	$videokategoriDizi = array();
	while($yaz=row($bak)){
		$videokategoriDizi[] = $yaz;
	}
	
	$bak=query("SELECT * FROM ".prefix."_tarifler
	WHERE tarifler_durum='1' and tarifler_anasayfa='1' and tarifler_dil='".paneldilid."' 
	ORDER BY tarifler_sira ASC ");
	$tariflerDizi = array();
	while($yaz=row($bak)){
		$tariflerDizi[] = $yaz;
	}
	
			
	
	$title = info("sitetitle");
	$desc = info("sitedesc");
	$image = info("defaultresim");
?>

