<?php

	if($config["yonetici"]["yonetici_id"]>0){
		for($r=0;$r<count($_FILES["dosya"]["tmp_name"]);$r++){
			if($_FILES["dosya"]["tmp_name"][$r]!=""){
				##Resim Değerleri##
				$kaynak		 = $_FILES["dosya"]["tmp_name"][$r];
				$resim 		 = $_FILES["dosya"]["name"][$r];
				$rtipi		 = $_FILES["dosya"]["type"][$r];
				$rboyut		 = $_FILES["dosya"]["size"][$r];
				$hedef 		 = "../../app/Images";
				$resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);
				if($resim==1){
					$hata[] = "Kaynak Alınamadı";
				}elseif($resim==2){
					$hata[] = "Dosya Boyutu Yüksek";
				}elseif($resim==3){
					$hata[] = "Dosya Tipi Desteklenmiyor";
				}elseif($resim==4){
					$hata[] = "Dosyayı Yüklemede Hata Yaşadık";
				}elseif($resim==5){
					$hata[] = "WebP Dönüşümü Sorunu Oldu";
				}else{
					
					query("INSERT INTO ".prefix."_ortam SET
					ortam_dosya = '$resim',
					ortam_yol = 'app/Images/'
					");	
					$hata[] = "Yükleme Başarılı;";
				}																
			}
		}
		$json['tost'] = "info";
		$json['mesaj'] = implode("<br>",$hata);
		$json['tikla'] = "#ortamguncelle";
		logekle("Güncelleme","Ortam");
	}else{
		$json['uyari'] = pd("Lütfen giriş yapın.");
		$json['renk'] = 'warning';	
		$json['git'] = 'index.php';
	}
	

echo json_encode($json);