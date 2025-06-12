<?php
require "../../app/Config/config-db.php";

$dir = "../../app/Helper/";
if(is_dir($dir))
{
	if($handle = opendir($dir))
	{
		while(($file = readdir($handle)) !== false)
		{
			if($file != ".htaccess" && $file != "." && $file != ".." && $file != "Thumbs.db"/*Bazi sinir bozucu windows dosyalari.*/)
			{
				require "../../app/Helper/".$file;
				
			}
		}
		closedir($handle);
	}
}else{
}

require "../../app/Config/config-site.php";
$page = g("page");
$ilk6 = substr($page, 0, 6);

if($ilk6=="modul-"){
	$modul = str_replace("modul-","",$page);
	require "../modul/".$modul."/ajax.php";
}else{
	require $page.".php";
}
