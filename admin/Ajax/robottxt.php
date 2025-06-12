<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "ayarlar";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	##-------------------------Genel Ayarlar----------------------#
	if($ickisim=="duzenle"){
		if($config["yetki"]["duzenle"]==1){
			$icerik=$_POST["icerik"];
			
			$dosya = fopen('../../robots.txt', 'w');
			fwrite($dosya, $icerik);
			fclose($dosya);
			
			
			$json['tost'] = 'success';
			$json['mesaj'] = 'Kayıt işlemi başarılı.';
			$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
				
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	
	
		
}

echo json_encode($json);