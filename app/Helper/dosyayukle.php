<?php
function dosyayukle($kaynak,$dosya,$rtipi,$rboyut,$hedef){
	if($kaynak!=""){
	$dosyabol	 = explode(".",$dosya);
	$ruzanti	 = $dosyabol[count($dosyabol)-1];
	$txt		 = str_replace(".".$ruzanti,"",$dosya);
	$yeniad		 = permalink($txt)."_".time();
	$yenidosya 	 = $yeniad.".".$ruzanti;
		if($kaynak==""){
			return 1;
		}elseif($rboyut > 10000000){
			return $rboyut;
		}elseif(
			($rtipi!="application/octet-stream") && 
			($rtipi!="application/vnd.openxmlformats-officedocument.wordprocessingml.document") && 
			($rtipi!="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") &&
			($rtipi!="text/html") &&
			($rtipi!="text/plain") &&
			($rtipi!="video/x-flv") &&
			($rtipi!="application/pdf") &&
			($rtipi!="video/mp4")
			){
			return $rtipi;
		}else{
			if(@move_uploaded_file($kaynak,$hedef.'/'.$yenidosya)){
			$konu_dosya=$yenidosya;
			return $konu_dosya;
			}else{
			return 2;
			}
							
		}

	}
}
?>