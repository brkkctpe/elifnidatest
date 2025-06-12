<?php
if($_POST){
	if($config["uye"]["uye_id"]>0){
		$u_id = $config["uye"]["uye_id"];
		$uye_tc = ass(p("uye_tc"));
		$uye_ad = ass(p("uye_ad"));
		$uye_soyad = ass(p("uye_soyad"));
		$uye_mail = ass(p("uye_mail"));
		$uye_adres = ass(p("uye_adres"));
		$uye_il = ass(p("uye_il"));
		$uye_ilce = ass(p("uye_ilce"));
		$uye_meslek = ass(p("uye_meslek"));
		$uye_dogumtarihi = ass(p("uye_dgun"))."/".ass(p("uye_day"))."/".ass(p("uye_dyil"));
		$uye_cinsiyet = ass(p("uye_cinsiyet"));
		$uye_boy = ass(p("uye_boy"));
		$uye_kilo = ass(p("uye_kilo"));
		$uye_hedefkilo = ass(p("uye_hedefkilo"));
		$uye_telefon = preg_replace('/[^.%0-9]/', '', p("uye_telefon"));
		$uye_telefon = str_replace(' ', '', $uye_telefon);
		$uye_alerji = ass(p("uye_alerji"));
		$uye_sevmediginiz = ass(p("uye_sevmediginiz"));
		$uye_ilgilenmediginiz = ass(p("uye_ilgilenmediginiz"));
		$uye_notlar = ass(p("uye_notlar"));
		
		$mailKont = rows(query("SELECT * FROM ".prefix."_uye WHERE uye_mail='$uye_mail' and uye_id!='$u_id' "));
		$telKont = rows(query("SELECT * FROM ".prefix."_uye WHERE uye_telefon='$uye_telefon' and uye_id!='$u_id' "));
	
		// ---------------------Fotograf Kayıt
		if($_FILES["uye_resim"]["tmp_name"]!=""){
			##Resim Değerleri##
			$kaynak		 = $_FILES["uye_resim"]["tmp_name"];
			$resim 		 = $_FILES["uye_resim"]["name"];
			$rtipi		 = $_FILES["uye_resim"]["type"];
			$rboyut		 = $_FILES["uye_resim"]["size"];
			$hedef 		 = "../Images";
			$uye_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);		
		}else{
			$uye_resim = ass(p("uye_resimg"));
		}
		// ---------------------Fotograf Kayıt
		$uye_tahlil=array();
		$uye_tahlil=$_POST["tahlil"];
		for($i=0;$i<count($_FILES["uye_tahlil"]["tmp_name"]);$i++){
			if($_FILES["uye_tahlil"]["tmp_name"][$i]!=""){
				##Resim Değerleri##
				$kaynak		 = $_FILES["uye_tahlil"]["tmp_name"][$i];
				$resim 		 = $_FILES["uye_tahlil"]["name"][$i];
				$rtipi		 = $_FILES["uye_tahlil"]["type"][$i];
				$rboyut		 = $_FILES["uye_tahlil"]["size"][$i];
				$hedef 		 = "../Images";
				$uye_tahlil[]=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);		
			}
		}
		$uye_tahlil = implode(",",$uye_tahlil);
		// ---------------------Fotograf Kayıt
		$uye_resimler=array();
		$uye_resimler=$_POST["resimler"];
		for($i=0;$i<count($_FILES["uye_resimler"]["tmp_name"]);$i++){
			if($_FILES["uye_resimler"]["tmp_name"][$i]!=""){
				##Resim Değerleri##
				$kaynak		 = $_FILES["uye_resimler"]["tmp_name"][$i];
				$resim 		 = $_FILES["uye_resimler"]["name"][$i];
				$rtipi		 = $_FILES["uye_resimler"]["type"][$i];
				$rboyut		 = $_FILES["uye_resimler"]["size"][$i];
				$hedef 		 = "../Images";
				$uye_resimler[]=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);		
			}
		}
		$uye_resimler = implode(",",$uye_resimler);
		
		if($uye_ad=="" or $uye_soyad=="" or $uye_mail=="" or $uye_telefon==""){
			$json["tost"] = "warning";
			$json["mesaj"] = "Lütfen tüm alanları doldurun.";
			$json["uyari"] = '<div class="alert alert-warning">Lütfen tüm alanları doldurun.</div>';
		}elseif(!emailsorgula($uye_mail)){
			$json["tost"] = "warning";
			$json["mesaj"] = "Lütfen geçerli bir mail adresi yazın.";
			$json["uyari"] = '<div class="alert alert-warning">Lütfen geçerli bir mail adresi yazın.</div>';
		}elseif($mailKont>0){
			$json["tost"] = "warning";
			$json["mesaj"] = "Bu mail adresi başka bir kullanıcı tarafından kullanılıyor.";
			$json["uyari"] = '<div class="alert alert-warning">Bu mail adresi başka bir kullanıcı tarafından kullanılıyor.</div>';
		}elseif($telKont>0){
			$json["tost"] = "warning";
			$json["mesaj"] = "Bu telefon başka bir kullanıcı tarafından kullanılıyor.";
			$json["uyari"] = '<div class="alert alert-warning">Bu telefon başka bir kullanıcı tarafından kullanılıyor.</div>';
		}else{
			$query="UPDATE ".prefix."_uye SET
			uye_tc='$uye_tc',
			uye_ad='$uye_ad',
			uye_soyad='$uye_soyad',
			uye_mail='$uye_mail',
			uye_telefon='$uye_telefon',
			uye_dogumtarihi='$uye_dogumtarihi',
			uye_adres='$uye_adres',
			uye_il='$uye_il',
			uye_ilce='$uye_ilce',
			uye_meslek='$uye_meslek',
			uye_cinsiyet='$uye_cinsiyet',
			uye_boy='$uye_boy',
			uye_kilo='$uye_kilo',
			uye_hedefkilo='$uye_hedefkilo',
			uye_resim='$uye_resim',
			uye_alerji='$uye_alerji',
			uye_sevmediginiz='$uye_sevmediginiz',
			uye_ilgilenmediginiz='$uye_ilgilenmediginiz',
			uye_notlar='$uye_notlar',
			uye_tahlil='$uye_tahlil',
			uye_resimler='$uye_resimler'
			WHERE uye_id='$u_id'";
			$ekle=query($query);
			if($ekle){
				$json["tost"] = "success";
				$json["mesaj"] = "Kayıt işlemi başarılı.";
				$json["uyari"] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
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

