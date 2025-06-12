<?php
require "app/Config/config-db.php";

$dir = "app/Helper/";
if(is_dir($dir))
{
	if($handle = opendir($dir))
	{
		while(($file = readdir($handle)) !== false)
		{
			if($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db"/*Bazi sinir bozucu windows dosyalari.*/)
			{
				require "app/Helper/".$file;
				
			}
		}
		closedir($handle);
	}
}else{
}


require "app/Config/config-site.php";

$urlget=g("url");
$urlget=explode("/",$urlget);

if(in_array($urlget[0],$diluzanti)){
	setcookie("dil", $urlget[0], time() + (86400 * 30), "/");
	if(paneldil!=$urlget[0]){
		go(siteurl.$urlget[0]);
	}
	$yeniurlget = array();
	foreach($urlget as $key=>$deger){
		if($key!=0){
			$yeniurlget[] = $deger;
		}
	}
	$urlget = $yeniurlget;
}

$cachesaat = $siteayar["ayarlar_sitecache"];
if($cachesaat>0){
	$cache_klasor = 'app/Cache/';
	$dosya_isim = md5($_SERVER['REQUEST_URI']);
	$dosya_yolu = $cache_klasor.$dosya_isim. '.html';
	$cache_suresi = $cachesaat * 60 * 60; // cache süresi 3 saat

	if (file_exists($dosya_yolu)){ // cache dosyası var ise
		// filemtime() = dosyanın son düzenlenme zamanını bulur
		if(time() - $cache_suresi < filemtime($dosya_yolu)){ //cache dosyasının süresi bitmediyse
			readfile($dosya_yolu); //dosyayı oku
			exit; //aşağıdaki satırları okuma
		}else{ // cache süresi doldu ise
			unlink($dosya_yolu); //dosyayı, cache sil
		}
	}

	ob_start();

	require "app/init.php";

	$sayfa_verisi = ob_get_contents();
	ob_end_flush();

	$dosya = fopen($dosya_yolu, 'w+'); //cache dosyasını aç
	fwrite($dosya, $sayfa_verisi); //dosyaya yaz
	fclose($dosya); //dosyayı kapat
}else{
	require "app/init.php";
}
?>