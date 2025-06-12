<?php
if($_POST){
	
		
		$deger = explode("{:}",p("deger"));
		$kupon_kod = $deger[1];
		
		$kuponOku=row(query("SELECT * FROM ".prefix."_kupon WHERE kupon_kod='$kupon_kod'"));
		if($kuponOku["kupon_durum"]<1){
			$json["tost"] = "warning";
			$json["mesaj"] = pd("Kupon kodu aktif değil...");
		}else{
			
			setcookie("kupon", $kuponOku["kupon_kod"], time() + (60*60*24), "/");
			
			$json["tost"] = "success";
			$json["mesaj"] = pd("Kupon aktif edildi.");
			$json["tikla"] = "#sepetgetir";
			
		}
		
}

echo json_encode($json);

?>

