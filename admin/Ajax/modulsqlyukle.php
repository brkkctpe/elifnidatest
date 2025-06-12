<?php

if($_POST){
	$dosya = p("deger");
	$sonuc = sqlaktar($dosya);
	
	$json["tost"] = "info";
	$json["mesaj"] = $sonuc;
	$json["git"] = "index.php?do=ayarlar_modul";
	
}

echo json_encode($json);