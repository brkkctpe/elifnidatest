<?php
if($_POST){
	
		
	$boy = ass(p("boy"))/100;
	$kilo = ass(p("kilo"));
	$yas = ass(p("yas"));
	$bel = ass(p("bel"));
	
	$bki=round($kilo / ($boy * $boy),2);
	
	if(18.5>=$bki){
		$json["uyari"] = "<div class='alert alert-warning'>Vücut Kitle Endeksiniz<br>".$bki." Zayıf</div>";
	}elseif(24.9>=$bki){
		$json["uyari"] = "<div class='alert alert-success'>Vücut Kitle Endeksiniz<br>".$bki." Normal kilolu</div>";
	}elseif(29.9>=$bki){
		$json["uyari"] = "<div class='alert alert-info'>Vücut Kitle Endeksiniz<br>".$bki." Fazla kilolu</div>";
	}elseif(34.9>=$bki){
		$json["uyari"] = "<div class='alert alert-warning'>Vücut Kitle Endeksiniz<br>".$bki." Obez</div>";
	}elseif(39.9>=$bki){
		$json["uyari"] = "<div class='alert alert-warning'>Vücut Kitle Endeksiniz<br>".$bki." Aşırı obez</div>";
	}else{
		$json["uyari"] = "<div class='alert alert-danger'>Vücut Kitle Endeksiniz<br>".$bki." Morbid obez</div>";
	}
	
	
	
}

echo json_encode($json);
?>

