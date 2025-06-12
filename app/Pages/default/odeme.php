<?php
	if($config["uye"]["uye_id"]<1){
		go(url."giris",0);
	}
	$sepetDizi = sepet();
	
	$sepet_kod = rand(1000000,9999999);
	$sepet_uye = $config["uye"]["uye_id"];
	$sepet_tutar = $sepetDizi["toplamfiyat"];
	$sepet_odemetur = 0;
	$sepet_odemedurum = 0;
	$sepet_durum = 1;
	$sepet_kayitzaman = time();

	$errorMessage = "";
	foreach($sepetDizi["urunler"] as $key=>$deger){
		
		$seanslar = $sepetDizi["seanslar"][$key];
		if($deger["urun_takvimtur"]==0){
			foreach($seanslar as $seanstime){
				if($seanstime<time()){
					$errorMessage = $deger["urun_adi"].pd("; bu ürün için randevu tarihi eksik.");
				}
			}
		}elseif($deger["urun_takvimtur"]==1){
			foreach($seanslar as $seanstime){
				if($seanstime<(time()-(60*60*24))){
					$errorMessage = $deger["urun_adi"].pd("; bu ürün için randevu tarihi eksik.");
				}
			}
		}
		
	}	
	
	$sayfa_okurl = url.ld("odeme-onay")."/".$sepet_kod;
	
	require_once(eklentiyol.'iyzipay/samples/config.php');

	# create request class
	$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
	$request->setLocale(\Iyzipay\Model\Locale::TR);
	$request->setConversationId($sepet_kod);
	$request->setPrice($sepet_tutar);
	$request->setPaidPrice($sepet_tutar);
	$request->setCurrency(\Iyzipay\Model\Currency::TL);
	
	$request->setBasketId($sepet_kod);
	$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
	$request->setCallbackUrl($sayfa_okurl);

	$buyer = new \Iyzipay\Model\Buyer();
	$buyer->setId($config["uye"]["uye_id"]=="" ? $sepet_kod : $config["uye"]["uye_id"]);
	$buyer->setName($config["uye"]["uye_ad"]=="" ? "Melike" : $config["uye"]["uye_ad"]);
	$buyer->setSurname($config["uye"]["uye_soyad"]=="" ? "Çetintaş" : $config["uye"]["uye_soyad"]);
	$buyer->setGsmNumber($config["uye"]["uye_telefon"]=="" ? info("telefon1") : $config["uye"]["uye_telefon"]);
	$buyer->setEmail($config["uye"]["uye_mail"]=="" ? info("mail") : $config["uye"]["uye_mail"]);
	$buyer->setIdentityNumber("12312312312");
	$buyer->setRegistrationAddress(info("adres"));
	$buyer->setIp(GetIP());
	$buyer->setCity("İstanbul");
	$buyer->setCountry("Turkey");
	$request->setBuyer($buyer);

	$shippingAddress = new \Iyzipay\Model\Address();
	$shippingAddress->setContactName($config["uye"]["uye_ad"]=="" ? "Melike" : $config["uye"]["uye_ad"]);
	$shippingAddress->setCity("İstanbul");
	$shippingAddress->setCountry("Turkey");
	$shippingAddress->setAddress(info("adres"));
	$shippingAddress->setZipCode("34742");
	$request->setShippingAddress($shippingAddress);

	$billingAddress = new \Iyzipay\Model\Address();
	$billingAddress->setContactName("Melike Çetintaş");
	$billingAddress->setCity("İstanbul");
	$billingAddress->setCountry("Turkey");
	$billingAddress->setAddress(info("adres"));
	$billingAddress->setZipCode("34743");
	$request->setBillingAddress($billingAddress);

	$basketItems = array();
		

	$firstBasketItem = new \Iyzipay\Model\BasketItem();
	$firstBasketItem->setId($sepet_kod);
	$firstBasketItem->setName("Danışmanlık Hizmeti");
	$firstBasketItem->setCategory1("Ürünler");
	$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
	$firstBasketItem->setPrice($sepet_tutar);
	// $firstBasketItem->setSubMerchantKey($doktorOku["uye_iyzicoid"]);
	// $firstBasketItem->setSubMerchantPrice($soru_doktorkomisyon);
	$basketItems[] = $firstBasketItem;

	
	$request->setBasketItems($basketItems);
	# make request
	$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());
	# print result
	// print_r($checkoutFormInitialize);
	// print_r($checkoutFormInitialize->getStatus());
	// print_r($checkoutFormInitialize->getErrorMessage());
	
	if($checkoutFormInitialize->getStatus()!="success"){
		$errorMessage = $checkoutFormInitialize->getErrorMessage();
	}
	print_r($checkoutFormInitialize->getCheckoutFormContent());
		
		
	
	$bak=query("SELECT * FROM ".prefix."_hesapnumaralari
	WHERE hesapnumaralari_durum='1'
	ORDER BY hesapnumaralari_id ASC ");
	$hesapnumaralariDizi = array();
	while($yaz=row($bak)){
		$hesapnumaralariDizi[] = $yaz;
	}
	
	
	$title = $sayfaDizi["sayfa_adi"]=="" ? info("sitetitle") : $sayfaDizi["sayfa_adi"];
	$desc = $sayfaDizi["sayfa_desc"]=="" ? info("sitedesc") : $sayfaDizi["sayfa_desc"];
	$image = $sayfaDizi["sayfa_resim"]=="" ? info("defaultresim") : rg($sayfaDizi["sayfa_resim"]);
?>

