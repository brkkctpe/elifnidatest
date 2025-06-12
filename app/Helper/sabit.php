<?php

function sabit($par,$sira=""){
	$bak=query("SELECT * FROM ".prefix."_sabit 
	WHERE (sabit_dil='".paneldilid."' or sabit_dil='0') ");
	$sabitDizi = array();
	while($yaz=row($bak)){
		$sabitDizi[$yaz["sabit_adi"]] = ss($yaz["sabit_aciklama".$sira]);
	}
	return $sabitDizi[$par];
}

function sabitr($par,$sira=""){
	$bak=query("SELECT * FROM ".prefix."_sabit 
	WHERE (sabit_dil='".paneldilid."' or sabit_dil='0') ");
	$sabitDizi = array();
	while($yaz=row($bak)){
		$sabitDizi[$yaz["sabit_adi"]] = ss($yaz["sabit_resim".$sira]);
	}
	return rg($sabitDizi[$par]);
}

?>