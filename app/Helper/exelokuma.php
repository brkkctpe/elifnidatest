<?php


function exeloku($dosyayol){
	include eklentiyol.'simplexlsx-master/src/SimpleXLSX.php';
	if ( $xlsx = SimpleXLSX::parse($dosyayol) ) {
		return $xlsx->rows();
	} else {
		return SimpleXLSX::parseError();
	}

	
}
?>