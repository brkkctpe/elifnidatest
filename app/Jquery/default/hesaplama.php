<?php
if($_POST){
	
		
	$hesap = ass(p("hesap"));
	
	if($hesap=="idealkilo"){
		$json["uyari"] = "<div class='alert alert-success'>".idealkilo($_POST)."</div>";
	}elseif($hesap=="gunlukkaloriihtiyaci"){
		$json["uyari"] = "<div class='alert alert-success'>".gunlukkaloriihtiyaci($_POST)."</div>";
	}elseif($hesap=="gunlukkarbonhidratihtiyaci"){
		$json["uyari"] = "<div class='alert alert-success'>".gunlukkarbonhidratihtiyaci($_POST)."</div>";
	}elseif($hesap=="gunlukyagihtiyaci"){
		$json["uyari"] = "<div class='alert alert-success'>".gunlukyagihtiyaci($_POST)."</div>";
	}elseif($hesap=="gunlukproteinihtiyaci"){
		$json["uyari"] = "<div class='alert alert-success'>".gunlukproteinihtiyaci($_POST)."</div>";
	}elseif($hesap=="yagsizvucutkitlesi"){
		$json["uyari"] = "<div class='alert alert-success'>".yagsizvucutkitlesi($_POST)."</div>";
	}elseif($hesap=="belboyorani"){
		$json["uyari"] = "<div class='alert alert-success'>".belboyorani($_POST)."</div>";
	}elseif($hesap=="gunluksuihtiyaci"){
		$json["uyari"] = "<div class='alert alert-success'>".gunluksuihtiyaci($_POST)."</div>";
	}elseif($hesap=="katojenikhesaplama"){
		$json["uyari"] = "<div class='alert alert-success'>".katojenikhesaplama($_POST)."</div>";
	}elseif($hesap=="kafeintuketimmiktari"){
		$json["uyari"] = "<div class='alert alert-success'>".kafeintuketimmiktari($_POST)."</div>";
	}elseif($hesap=="emzirenkaloriihtiyaci"){
		$json["uyari"] = "<div class='alert alert-success'>".emzirenkaloriihtiyaci($_POST)."</div>";
	}elseif($hesap=="gebelik"){
		$json["uyari"] = "<div class='alert alert-success'>".gebelik($_POST)."</div>";
	}elseif($hesap=="gunlukmakrobesin"){
		$json["uyari"] = "<div class='alert alert-success'>".gunlukmakrobesin($_POST)."</div>";
	}elseif($hesap=="adetgunuhesapla"){ 
		$json["uyari"] = "<div class='alert alert-success'>".adetgunuhesapla($_POST)."</div>";
	}elseif($hesap=="gunlukvitamin"){ 
		$json["uyari"] = "<div class='alert alert-success'>".gunlukvitamin($_POST)."</div>";
	}elseif($hesap=="bazalmetabolizma"){ 
		$json["uyari"] = "<div class='alert alert-success'>".bazalmetabolizma($_POST)."</div>";
	}elseif($hesap=="vucutkitleindeksi"){ 
		$json["uyari"] = "<div class='alert alert-success'>".vucutkitleindeksi($_POST)."</div>";
	}elseif($hesap=="vucutyagorani"){ 
		$json["uyari"] = "<div class='alert alert-success'>".vucutyagorani($_POST)."</div>";
	}elseif($hesap=="belkalcaorani"){ 
		$json["uyari"] = "<div class='alert alert-success'>".belkalcaorani($_POST)."</div>";
	}else{
		$json["uyari"] = "<div class='alert alert-warning'>".pd("Geçersiz hesaplama")."</div>";
	}
	
}

echo json_encode($json);
?>

