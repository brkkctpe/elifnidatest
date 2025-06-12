<?php
	if($config["uye"]["uye_id"]<1){
		go(url."giris",0);
	}
	$sepetDizi = sepet();
	
	$sepet_kod = p("sepet_kod");
	$sepet_uye = $config["uye"]["uye_id"];
	$sepet_tutar = $sepetDizi["toplamfiyat"];
	$sepet_odemetur = 1;
	$sepet_durum = 1;
	$sepet_kayitzaman = time();
	
	$hata = "";
	
	
	require_once(eklentiyol.'iyzipay/samples/config.php');

	# create request class
	$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
	$request->setLocale(\Iyzipay\Model\Locale::TR);
	$request->setConversationId("conversationId");
	$request->setToken($sepet_kod);

	# make request
	$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

	# print result
	// print_r($checkoutForm);

	if($checkoutForm->getPaymentStatus()!="SUCCESS"){
		$hata = '<div class="alert alert-warning"><div class="alert-body">'.$checkoutForm->getErrorMessage().'</div></div>';
	}else{
		$RawResult = json_decode($checkoutForm->getRawResult(),true);
		// print_r($RawResult); 
		
		$sepet_odemedurum = 1;
		$sepet_durum = 1;	
		// print_r($sepetDizi);
				
	}	
	
	
	
	if($hata!=""){
		$sonuc = $hata;
	}else{
		
		$query = "INSERT INTO ".prefix."_sepet SET
		sepet_kod='$sepet_kod',
		sepet_uye='$sepet_uye',
		sepet_tutar='$sepet_tutar',
		sepet_odemetur='$sepet_odemetur',
		sepet_odemedurum='$sepet_odemedurum',
		sepet_durum='$sepet_durum',
		sepet_kayitzaman='$sepet_kayitzaman'
		";
		$ekle = query($query);
		
		if($ekle){
			$sepetoku=row(query("SELECT * FROM ".prefix."_sepet WHERE sepet_kod='$sepet_kod'"));
			$sepet_id = $sepetoku["sepet_id"];
			$randevuhata = 0;
			foreach($sepetDizi["urunler"] as $key=>$deger){
				
				$seanslar = $sepetDizi["seanslar"][$key];

				if($deger["urun_takvimtur"]==0){
					foreach($seanslar as $seansnum=>$seanstime){
						$randevuekle = query("INSERT INTO ".prefix."_randevu SET
						randevu_uye='$sepet_uye',
						randevu_sepet='$sepet_id',
						randevu_seans='$seansnum',
						randevu_zaman='$seanstime',
						randevu_tur='".$deger["urun_id"]."',
						randevu_kayitzaman='".time()."'
						");
						if(!$randevuekle){ $randevuhata = 1;}
					}
				}elseif($deger["urun_takvimtur"]==1){
					foreach($seanslar as $seansnum=>$seanstime){
						$randevuekle = query("INSERT INTO ".prefix."_randevu SET
						randevu_uye='$sepet_uye',
						randevu_sepet='$sepet_id',
						randevu_seans='$seansnum',
						randevu_zaman='$seanstime',
						randevu_tur='".$deger["urun_id"]."',
						randevu_kayitzaman='".time()."'
						");
						if(!$randevuekle){ $randevuhata = 1;}
					}
				}else{
					$randevuekle = query("INSERT INTO ".prefix."_randevu SET
					randevu_uye='$sepet_uye',
					randevu_sepet='$sepet_id',
					randevu_zaman='".time()."',
					randevu_tur='".$deger["urun_id"]."',
					randevu_kayitzaman='".time()."'
					");
					if(!$randevuekle){ $randevuhata = 1;}
				}
				
			}
			if($randevuhata>0){
				$sonuc = '<div class="alert alert-danger">'.pd("Randevu oluşturmada hata çıktı. Lütfen bizi bilgilendirin.").'</div>';
				query("DELETE FROM ".prefix."_randevu WHERE randevu_sepet='$sepet_id' ");
				query("DELETE FROM ".prefix."_sepet WHERE sepet_id='$sepet_id' ");
			}else{
				$sonuc = '<div class="alert alert-success">'.pd("Randevularınız Oluşturuldu. Randevularınızın aktif olması için ödemenizi yaptıktan sonra bize bildirmeniz gerekli.").'</div>';
				setcookie("sepet", "", time() - (60*60*24), "/");
			}
			
		}else{
			$sonuc = '<div class="alert alert-danger">'.queryalert($query).'</div>';
		}
		
	}
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

