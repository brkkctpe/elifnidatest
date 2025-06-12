<?php
if($_POST){
	if($config["uye"]["uye_id"]>0){
		
		$olcum_uye = $config["uye"]["uye_id"];
		$olcum_tarih = ass(p("olcum_tarih"));
		$olcum_agirlik = ass(p("olcum_agirlik"));
		$olcum_bel = ass(p("olcum_bel"));
		$olcum_gobek = ass(p("olcum_gobek"));
		$olcum_ustkol = ass(p("olcum_ustkol"));
		$olcum_ustbacak = ass(p("olcum_ustbacak"));
		$olcum_kalca = ass(p("olcum_kalca"));
		$olcum_gogus = ass(p("olcum_gogus"));
		$olcum_boyun = ass(p("olcum_boyun"));
		$olcum_odem = ass(p("olcum_odem"));
		$olcum_kabizlik = ass(p("olcum_kabizlik"));
		$olcum_regloncesi = ass(p("olcum_regloncesi"));
		$olcum_reglsonrasi = ass(p("olcum_reglsonrasi"));
		$olcum_uyum = ass(p("olcum_uyum"));
		$olcum_egzersiz = ass(p("olcum_egzersiz"));
		$olcum_mesaj = ass(p("olcum_mesaj"));
		$olcum_kayitzaman = time();
						
		// ---------------------Fotograf Kayıt
		if($_FILES["olcum_resim"]["tmp_name"]!=""){
			##Resim Değerleri##
			$kaynak		 = $_FILES["olcum_resim"]["tmp_name"];
			$resim 		 = $_FILES["olcum_resim"]["name"];
			$rtipi		 = $_FILES["olcum_resim"]["type"];
			$rboyut		 = $_FILES["olcum_resim"]["size"];
			$rboyut		 = $_FILES["olcum_resim"]["size"];
			$hedef 		 = "../Images";
			$olcum_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);		
		}
		
		if($olcum_tarih=="" or $olcum_agirlik==""){
			$json["tost"] = "warning";
			$json["mesaj"] = "Lütfen tüm alanları doldurun.";
			$json["uyari"] = '<div class="alert alert-warning">Lütfen tüm alanları doldurun.</div>';
		}else{
			$query="INSERT INTO ".prefix."_olcum SET
			olcum_uye = '$olcum_uye',
			olcum_tarih = '$olcum_tarih',
			olcum_resim = '$olcum_resim',
			olcum_agirlik = '$olcum_agirlik',
			olcum_bel = '$olcum_bel',
			olcum_gobek = '$olcum_gobek',
			olcum_ustkol = '$olcum_ustkol',
			olcum_ustbacak = '$olcum_ustbacak',
			olcum_kalca = '$olcum_kalca',
			olcum_gogus = '$olcum_gogus',
			olcum_boyun = '$olcum_boyun',
			olcum_odem = '$olcum_odem',
			olcum_kabizlik = '$olcum_kabizlik',
			olcum_regloncesi = '$olcum_regloncesi',
			olcum_reglsonrasi = '$olcum_reglsonrasi',
			olcum_uyum = '$olcum_uyum',
			olcum_egzersiz = '$olcum_egzersiz',
			olcum_mesaj = '$olcum_mesaj',
			olcum_kayitzaman = '$olcum_kayitzaman'
			";
			$ekle=query($query);
			if($ekle){
				$json["tost"] = "success";
				$json["mesaj"] = "Kayıt işlemi başarılı.";
				$json["uyari"] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
				$json["git"] = url.ld("olcumlerim");
			}else{
				$json["tost"] = "danger";
				$json["mesaj"] = queryalert($query);
				$json["uyari"] = '<div class="alert alert-warning">'.queryalert($query).'</div>';
			}
		}
	
	}else{
		$json["git"] = url."kayit";
	}
	
}

echo json_encode($json);
?>

