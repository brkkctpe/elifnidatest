<?php
if($_POST){
	
	$mail = p("mail");
	
	$kont=rows(query("SELECT * FROM ".prefix."_ebulten WHERE ebulten_mail='$mail'"));
	
	if($mail==""){
		$json["tost"] = 'warning';
		$json["mesaj"] = pd("Lütfen mail alanını boş bırakmayın.");
	}elseif(!emailsorgula($mail)){
		$json["tost"] = 'warning';
		$json["mesaj"] = pd("Lütfen geçerli bir mail adresi giriniz.");
	}elseif($kont>0){
		$json["tost"] = 'warning';
		$json["mesaj"] = pd("Mail adresiniz bültenimize zaten kayıtlı.");
	}else{
		$query="INSERT INTO ".prefix."_ebulten SET 
		ebulten_mail='$mail',
		ebulten_durum='1',
		ebulten_kayitzaman='".time()."'
		";
		$ekle=query($query);
		if($ekle){
			$json["tost"] = 'success';
			$json["mesaj"] = pd("E-Bülten'e kaydınız başarılı şekilde kayıt edildi");
			$json['sil'] = 1;
		}else{
			$json["tost"] = 'danger';
			$json["mesaj"] = queryalert($query);
		}
		
	}
}

echo json_encode($json);

?>

