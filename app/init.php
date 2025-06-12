<?php

$modul=query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_permalink='".$urlget[0]."'");
$urun_modul=query("SELECT * FROM ".prefix."_urun WHERE urun_permalink='".$urlget[0]."'");
$blog_modul=query("SELECT * FROM ".prefix."_blog WHERE blog_permalink='".$urlget[0]."'");
$urunkategori_modul=query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_permalink='".$urlget[0]."'");
$tarifler_modul=query("SELECT * FROM ".prefix."_tarifler WHERE tarifler_permalink='".$urlget[0]."'");
$hesap_modul=query("SELECT * FROM ".prefix."_hesap WHERE hesap_permalink='".$urlget[0]."'");

if($siteayar["ayarlar_bakimda"]>0 and $config["yonetici"]["yonetici_id"]<1){
	require realpath('.')."/app/Pages/".theme."/bakimda.php";
	$hf=1;
}elseif(rows($modul)>0){
	require realpath('.')."/app/Pages/".theme."/modul.php";
}elseif(rows($urun_modul)>0){
	require realpath('.')."/app/Pages/".theme."/program.php";
}elseif(rows($blog_modul)>0){
	require realpath('.')."/app/Pages/".theme."/blogoku.php";
}elseif(rows($urunkategori_modul)>0){
	require realpath('.')."/app/Pages/".theme."/beslenme-programlari.php";
}elseif(rows($tarifler_modul)>0){
	require realpath('.')."/app/Pages/".theme."/tarif.php";
}elseif(rows($hesap_modul)>0){
	require realpath('.')."/app/Pages/".theme."/hesaplama.php";
}elseif($urlget[0]!="" and file_exists(realpath('.')."/app/Pages/".theme."/".$urlget[0].".php")){
	require realpath('.')."/app/Pages/".theme."/".$urlget[0].".php";
}elseif($urlget[0]==""){
	require realpath('.')."/app/Pages/".theme."/index.php";
}else{
	require realpath('.')."/app/Pages/".theme."/404.php";
	$hf=1;
}


ob_start();

	if($hf!=1){
		require themeurl."/header.php";
	}
	if($siteayar["ayarlar_bakimda"]>0 and $config["yonetici"]["yonetici_id"]<1){
		require themeurl."/bakimda.php";	
	}elseif(rows($modul)>0){
		require themeurl."/modul.php";	
	}elseif(rows($urun_modul)>0){
		require themeurl."/program.php";	
	}elseif(rows($blog_modul)>0){
		require themeurl."/blogoku.php";	
	}elseif(rows($urunkategori_modul)>0){
		require themeurl."/beslenme-programlari.php";	
	}elseif(rows($tarifler_modul)>0){
		require themeurl."/tarif.php";	
	}elseif(rows($hesap_modul)>0){
		require themeurl."/hesaplama.php";	
	}elseif($urlget[0]!="" and file_exists(realpath('.')."/app/Pages/".theme."/".$urlget[0].".php")){	
		require themeurl."/".$urlget[0].".php";
	}elseif($urlget[0]==""){
		require themeurl."/index.php";		
	}else{
		require themeurl."/404.php";		
	}

	if($hf!=1){
		require themeurl."/footer.php";
	}
	
$output = ob_get_contents();
ob_end_clean();




function sanitize_output($buffer) {

    $search = array(
        '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
        '/[^\S ]+\</s',     // strip whitespaces before tags, except space
        '/(\s)+/s',         // shorten multiple whitespace sequences
        '/<!--(.|\s)*?-->/' // Remove HTML comments
    );

    $replace = array(
        '>',
        '<',
        '\\1',
        ''
    );

    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}
function HtmlLazyLoad($string, $substitute){
	//$string - duzenlenecek html icerik
	/*
		amaci:  html icerikte bulunan butun img etiketlerinde 'src' ozelliginde bulunan resim yolunu 'data-src' ozelligi olusturup ona aktarmak
				ve 'src' ozelligine $substitute degerini eklemek.
				Html icerigindeki img etiketlerini lazyload eklentisine uyumlu hale getirmek
				$substitute degerine blanked.png resmi veya onizleme resmi eklenebilir ve sayfa acildigi an butun resimleri yukletmemis oluruz
	*/
	return preg_replace('/<img([^>]*)src=["\']([^>]*)["\']/', '<img\1src="'.$substitute.'" data-src="\2"', $string);
}
if($siteayar["ayarlar_sitelazy"]>0){
	$output = HtmlLazyLoad($output,url.themeurl.'/mainjscss/blank.webp');
}
preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i' , $output, $resler );

$alteklenen = array();
foreach($resler[1] as $orjres){
	$res = str_replace(url."app/Images/",'',$orjres);
	if(file_exists("app/Images/".$res)){
		$ortbak = query("SELECT * FROM ".prefix."_ortam WHERE ortam_dosya='$res'");
		
		if(rows($ortbak)<1){
			query("INSERT INTO ".prefix."_ortam SET
				ortam_dosya='$res',
				ortam_yol='app/Images/'
			");
		}else{
			if(!in_array($orjres,$alteklenen)){
				$ortoku=row($ortbak);
				$alt = $ortoku["ortam_alt"]=="" ? info("sitetitle") : $ortoku["ortam_alt"];
				$title = $ortoku["ortam_title"]=="" ? info("sitetitle") : $ortoku["ortam_title"];
				$output=str_replace('src="'.$orjres.'"','src="'.$orjres.'" alt="'.$alt.'" title="'.$title.'"',$output);
				$output=str_replace("src='".$orjres."'",'src="'.$orjres.'" alt="'.$alt.'" title="'.$title.'"',$output);
				$alteklenen[] = $orjres;
			}
		}
	}else{
	}
}

if($siteayar["ayarlar_siteminify"]>0){
	echo sanitize_output($output);
}else{
	echo $output;
}
?>