<?php



function mailgonder($alicimail,$aliciadi,$baslik,$icerik,$dosya){
	
	include eklentiyol.'PHPMailer/class.phpmailer.php';

	$mail = new PHPMailer;
	$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls'; // Güvenli baglanti icin ssl normal baglanti icin tls
	$mail->Host = mailhost; // Mail sunucusuna ismi
	$mail->Port = mailport; // Gucenli baglanti icin 465 Normal baglanti icin 587
	$mail->IsHTML(true);
	$mail->SetLanguage("tr", "phpmailer/language");
	$mail->CharSet  ="utf-8";
	$mail->Username = mailusername; // Mail adresimizin kullanicı adi
	$mail->Password = mailpassword; // Mail adresimizin sifresi
	$mail->From = mailusername;
	$mail->FromName = $aliciadi;
	for($i=0; $i < count($alicimail); $i ++)
	{
		if($alicimail[$i]!=""){
		$mail->addBCC($alicimail[$i],""); 
		}
	}
	$mail->Subject = $baslik; // Konu basligi
	$mail->Body = $icerik; // Mailin icerigi
	if(!$mail->Send()){
		return "Mailer Error: ".$mail->ErrorInfo;
	} else {
		return "Mesaj gonderildi";
	}	
}

function mailgonder4($alicimail,$aliciadi,$baslik,$icerik,$dosya){
	include eklentiyol.'PHPMailer/class.phpmailer.php';

	$mail = new PHPMailer;
	$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls'; // Güvenli baglanti icin ssl normal baglanti icin tls
	$mail->Host = mailhost; // Mail sunucusuna ismi
	$mail->Port = mailport; // Gucenli baglanti icin 465 Normal baglanti icin 587
	$mail->IsHTML(true);
	$mail->SetLanguage("tr", "phpmailer/language");
	$mail->CharSet  ="utf-8";
	$mail->Username = mailusername; // Mail adresimizin kullanicı adi
	$mail->Password = mailpassword; // Mail adresimizin sifresi
	$mail->SetFrom(mailusername, $aliciadi); // Mail attigimizda gorulecek ismimiz
	$mail->AddAddress($alicimail[0]); // Maili gonderecegimiz kisi yani alici
	$mail->Subject = $baslik; // Konu basligi
	$mail->Body = $icerik; // Mailin icerigi
	if(!$mail->Send()){
		return "Mailer Error: ".$mail->ErrorInfo;
	} else {
		return "Mesaj gonderildi".$alicimail[0];
	}
}

function mailgonder3($alicimail,$aliciadi,$baslik,$icerik,$dosya){
	include eklentiyol.'PHPMailer/class.phpmailer.php';

	$mail = new PHPMailer;
	$mail->isSMTP();                                     
	$mail->Host = mailhost; 
	$mail->SMTPAuth = true;                               
	$mail->Username = mailusername;                 
	$mail->Password = mailpassword;                           

	$mail->Port = mailport;                                   

	if(mailssl>0){ 
	$mail->SMTPSecure = "ssl";
	}
	$mail->setFrom($alicimail[0], $aliciadi);
	$mail->AddAddress($alicimail[0], $aliciadi);    
	$mail->addReplyTo($alicimail[0], $aliciadi);

	$mail->isHTML(true);                                  
	$mail->Subject = $baslik;
	$mail->Body    = $icerik;

	if(!$mail->send()) {
	return 'Mail Gönderilemedi Hata: ' . $mail->ErrorInfo;
	} else {
	return 'Mail Gönderildi';
	}
}

?>