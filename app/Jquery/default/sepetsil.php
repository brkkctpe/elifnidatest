<?php
if($_POST){
	
		
	$urun_id = p("deger");
	
	
	
	$sepet = unserialize($_COOKIE["sepet"]);
	
	unset($sepet[$urun_id]);
	$sepet = serialize($sepet);
	setcookie("sepet", $sepet, time() + (60*60*24), "/");
	
	$json["tost"] = "success";
	$json["mesaj"] = pd("Paket sepetten silindi.");
	$json["tikla"] = "#sepetgetir";
	
}

echo json_encode($json);
?>

