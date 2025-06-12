<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "uye";
	
	logekle($config["uye"]["uye_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			
			$uye_tc = ass(p("uye_tc"));
			$uye_ad=ass(p("uye_ad"));
			$uye_soyad=ass(p("uye_soyad"));
			$uye_mail=ass(p("uye_mail"));
			$uye_telefon=ass(p("uye_telefon"));
			$uye_parola=ass(p("uye_parola"));
			$uye_parolam=md5($uye_parola);
			$uye_resimortam=ass(p("uye_resimortam"));
			$uye_dogumtarihi = ass(p("uye_dgun"))."/".ass(p("uye_day"))."/".ass(p("uye_dyil"));
			$uye_adres = ass(p("uye_adres"));
			$uye_il = ass(p("uye_il"));
			$uye_ilce = ass(p("uye_ilce"));
			$uye_meslek = ass(p("uye_meslek"));
			$uye_cinsiyet = ass(p("uye_cinsiyet"));
			$uye_boy = ass(p("uye_boy"));
			$uye_kilo = ass(p("uye_kilo"));
			$uye_hedefkilo = ass(p("uye_hedefkilo"));
			
			$kont=rows(query("SELECT * FROM ".prefix."_uye WHERE uye_mail='$uye_mail'"));
			
			if($uye_ad=="" or $uye_mail=="" or $uye_telefon=="" or $uye_parola==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif(strlen($uye_parola)<6){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Parola en az 6 karakter olabilir.';
				$json['uyari'] = '<div class="alert alert-warning">Parola en az 6 karakter olabilir.</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu mail adresi başka bir yöneticiye ait';
				$json['uyari'] = '<div class="alert alert-warning">Bu mail adresi başka bir yöneticiye ait</div>';
			}else{
				
				if($_FILES["uye_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["uye_resim"]["tmp_name"];
					$resim 		 = $_FILES["uye_resim"]["name"];
					$rtipi		 = $_FILES["uye_resim"]["type"];
					$rboyut		 = $_FILES["uye_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$uye_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("uye_resimortam")!=""){
					$uye_resim = $uye_resimortam;	
				}
				
				$query="INSERT INTO ".prefix."_uye SET 
				uye_ad='$uye_ad',
				uye_soyad='$uye_soyad',
				uye_mail='$uye_mail',
				uye_telefon='$uye_telefon',
				uye_parola='$uye_parolam',
				uye_resim='$uye_resim',
				uye_tc='$uye_tc',
				uye_dogumtarihi='$uye_dogumtarihi',
				uye_adres='$uye_adres',
				uye_il='$uye_il',
				uye_ilce='$uye_ilce',
				uye_meslek='$uye_meslek',
				uye_cinsiyet='$uye_cinsiyet',
				uye_boy='$uye_boy',
				uye_kilo='$uye_kilo',
				uye_hedefkilo='$uye_hedefkilo',
				uye_durum='1',
				uye_kayitzaman='".time()."'
				";
				$ekle=query($query);
				if($ekle){
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?do=".$ilkkisim."_listele";
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Düzenle----------------------#
	if($ickisim=="duzenle"){
		if($config["yetki"]["duzenle"]==1){
			$uye_id=ass(p("uye_id"));
			$uye_tc=ass(p("uye_tc"));
			$uye_ad=ass(p("uye_ad"));
			$uye_soyad=ass(p("uye_soyad"));
			$uye_mail=ass(p("uye_mail"));
			$uye_telefon=ass(p("uye_telefon"));
			$uye_parola=ass(p("uye_parola"));
			if($uye_parola!=""){
				$uye_parolam=md5($uye_parola);
			}else{
				$uye_parolam=ass(p("uye_parolam"));
			}
			
			$uye_resimortam=ass(p("uye_resimortam"));
			$uye_dogumtarihi = ass(p("uye_dgun"))."/".ass(p("uye_day"))."/".ass(p("uye_dyil"));
			$uye_adres = ass(p("uye_adres"));
			$uye_il = ass(p("uye_il"));
			$uye_ilce = ass(p("uye_ilce"));
			$uye_meslek = ass(p("uye_meslek"));
			$uye_cinsiyet = ass(p("uye_cinsiyet"));
			$uye_boy = ass(p("uye_boy"));
			$uye_kilo = ass(p("uye_kilo"));
			$uye_hedefkilo = ass(p("uye_hedefkilo"));
			
			$kont=rows(query("SELECT * FROM ".prefix."_uye WHERE uye_mail='$uye_mail' and uye_id!='$uye_id' "));
			
			if($uye_ad=="" or $uye_mail=="" or $uye_telefon==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif(strlen($uye_parola)<6 and p("uye_parolam")==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Parola en az 6 karakter olabilir.';
				$json['uyari'] = '<div class="alert alert-warning">Parola en az 6 karakter olabilir.</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu mail adresi başka bir yöneticiye ait';
				$json['uyari'] = '<div class="alert alert-warning">Bu mail adresi başka bir yöneticiye ait</div>';
			}else{
				
				if($_FILES["uye_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["uye_resim"]["tmp_name"];
					$resim 		 = $_FILES["uye_resim"]["name"];
					$rtipi		 = $_FILES["uye_resim"]["type"];
					$rboyut		 = $_FILES["uye_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$uye_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("uye_resimortam")!=""){
					$uye_resim = $uye_resimortam;	
				}
				
				$query="UPDATE ".prefix."_uye SET 
				uye_ad='$uye_ad',
				uye_soyad='$uye_soyad',
				uye_mail='$uye_mail',
				uye_telefon='$uye_telefon',
				uye_parola='$uye_parolam',
				uye_resim='$uye_resim',
				uye_tc='$uye_tc',
				uye_dogumtarihi='$uye_dogumtarihi',
				uye_adres='$uye_adres',
				uye_il='$uye_il',
				uye_ilce='$uye_ilce',
				uye_meslek='$uye_meslek',
				uye_cinsiyet='$uye_cinsiyet',
				uye_boy='$uye_boy',
				uye_kilo='$uye_kilo',
				uye_hedefkilo='$uye_hedefkilo'
				WHERE uye_id='$uye_id'";
				$ekle=query($query);
				if($ekle){
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
				}else{
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($query);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($query).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Durum----------------------#
	if($ickisim=="durum"){
		if($config["yetki"]["duzenle"]==1){
			$id = p("deger");
			$oku=row(query("SELECT * FROM ".prefix."_uye WHERE uye_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["uye_durum"]==1){
					query("UPDATE ".prefix."_uye SET uye_durum='0' WHERE uye_id='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_uye SET uye_durum='1' WHERE uye_id='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-success">Aktif</span>';
				}
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Sil----------------------#
	if($ickisim=="sil"){
		if($config["yetki"]["sil"]==1){
			$id = p("deger");
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_uye WHERE uye_id='$id'");
				$json['tost'] = 'success';
				$json['mesaj'] = 'Satır silindi.';
				$json['sil'] = '#satir'.$id;
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
		
}

echo json_encode($json);