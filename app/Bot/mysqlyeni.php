<?php
require "../Config/config-db.php";

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
set_time_limit(0);
?>
<meta charset="UTF-8">
<?php


$query[] = "";


foreach($query as $deger){
	$ekle = query($deger);
	if($ekle){
		echo "İşlem çalıştı BAŞARILI<br>";
	}else{
		echo queryalert($deger)."<br>";
	}
}
?>