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

$bak=query("SELECT * FROM ".prefix."_ebultentoplu WHERE ebultentoplu_mailler!='' ORDER BY ebultentoplu_id ASC LIMIT 0,1");
if(rows($bak)>0){
	
	$oku = row($bak);
	$id = ss($oku["ebultentoplu_id"]);
	$mesaj = ss($oku["ebultentoplu_mesaj"]);
	$mailler = explode(";",$oku["ebultentoplu_mailler"]);
	
	$alici = array();
	$kalan = array();
	foreach($mailler as $key=>$deger){
		if($key<10){
			if($deger!=""){
				$alici[] = $deger;
			}
		}else{
			if($deger!=""){
				$kalan[] = $deger;
			}
		}
	}
	if(count($kalan)>0){
		$kalan = implode(";",$kalan);
	}else{
		query("UPDATE ".prefix."_ebultentoplu SET ebultentoplu_mailler='' WHERE ebultentoplu_id='$id'");
	}
	if(count($alici)>0){
		echo implode(";",$alici)." alıcılarına mail gönderildi.";
		mailgonder($alici,"Destek","Yeni Bir Mesajı",$mesaj,$dosya);
	}	
}else{
	echo "Toplu Mail Yok";
}



?>