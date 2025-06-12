<?php

require "../Config/config-db.php";
date_default_timezone_set('UTC');
$dir = "../Helper/";
if(is_dir($dir))
{
	if($handle = opendir($dir))
	{
		while(($file = readdir($handle)) !== false)
		{
			if($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db"/*Bazi sinir bozucu windows dosyalari.*/)
			{
				require "../Helper/".$file;
				
			}
		}
		closedir($handle);
	}
}else{
}

require "../Config/config-site.php";

$replaceDotCol=array(0,1,2,3,4,5); 

$fields = array('Id', 'Adı', 'Ekleyen', 'Tarih', 'Durum'); 

$kurallar = "";

if(g("arama")!=""){
	$kurallar = $kurallar." (rutbe_adi LIKE '%".g("arama")."%' 
	) and";
}

$kurallar = substr_replace($kurallar, '', -3);
if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
		  

$bak=query("SELECT * FROM ".prefix."_rutbe 
INNER JOIN ".prefix."_yonetici ON ".prefix."_yonetici.yonetici_id = ".prefix."_rutbe.rutbe_ekleyen
".$kurallar." ORDER BY rutbe_id DESC ");
$tableDizi = array();
while($yaz=row($bak)){
	$tableDizi[] = $yaz;
}

 
exportExcel('DosyaAdi',$fields,$tableDizi,$replaceDotCol);
?>