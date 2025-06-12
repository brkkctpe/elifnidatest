<?php

$oku=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_permalink='".$urlget[0]."' and sayfa_dil='".paneldilid."'"));
if($oku["sayfa_modul"]!=""){
	$dosyayol = "app/Themes/".theme."/".$oku["sayfa_modul"];
	if(file_exists($dosyayol)){
		require $dosyayol;
	}
}else{
?>



<?php
}

?>