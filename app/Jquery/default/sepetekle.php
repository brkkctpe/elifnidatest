<?php
if($_POST){
	
		
	$deger = explode("{:}",p("deger"));
	$urun_id = $deger[0];
	$zaman = $deger[1];
	$seans = $deger[2];
	
	$urunOku=row(query("SELECT * FROM ".prefix."_urun WHERE urun_id='".$urun_id."'"));
	
	
	if($urunOku["urun_durum"]<1){
		$json["tost"] = "warning";
		$json["mesaj"] = pd("Eklediğiniz paket aktif değil.");
	}else{
		
		$sepet = unserialize($_COOKIE["sepet"]);
		
		if($urunOku["urun_takvimtur"]==0){
			$sepetsatir["urun"] = $urun_id;
			if($seans<=$urunOku["urun_seans"]){
				for($i=1;$i<=$urunOku["urun_seans"];$i++){
					if($i==$seans){
						$sepetsatir["seans"][$seans] = $zaman;
					}else{
						$sepetsatir["seans"][$i] = $sepet[$urun_id]["seans"][$i];
					}
				}
				
			}
			if($seans<$urunOku["urun_seans"]){
				$json["git"] = url."takvim/".$urunOku["urun_permalink"]."/".($seans+1);
			}elseif($seans==$urunOku["urun_seans"]){
				$json["git"] = url."odeme";
			}
		}elseif($urunOku["urun_takvimtur"]==1){
			$sepetsatir["urun"] = $urun_id;
			for($i=1;$i<=$urunOku["urun_seans"];$i++){
				$sepetsatir["seans"][$i] = $zaman + (60*60*24*7*($i-1));
			}
			$json["git"] = url."odeme";
		}else{
			$sepetsatir["urun"] = $urun_id;
			$sepetsatir["seans"][0] = 0;
			$json["git"] = url."odeme";
		}
		
		$sepet[$urun_id] = $sepetsatir;
		$sepet = serialize($sepet);
		setcookie("sepet", $sepet, time() + (60*60*24), "/");
		
		$json["tost"] = "success";
		$json["mesaj"] = pd("Paket sepete eklendi.");
		$json["tikla"] = "#sepetgetir";
	}
}

echo json_encode($json);
?>

