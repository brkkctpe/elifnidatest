<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "yonetici";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$yonetici_ad=ass(p("yonetici_ad"));
			$yonetici_soyad=ass(p("yonetici_soyad"));
			$yonetici_mail=ass(p("yonetici_mail"));
			$yonetici_telefon=ass(p("yonetici_telefon"));
			$yonetici_ekip=ass(p("yonetici_ekip"));
			$yonetici_parola=ass(p("yonetici_parola"));
			$yonetici_parolam=md5($yonetici_parola);
			$yonetici_resimortam=ass(p("yonetici_resimortam"));
			
			$kont=rows(query("SELECT * FROM ".prefix."_yonetici WHERE yonetici_mail='$yonetici_mail'"));
			
			if($yonetici_ad=="" or $yonetici_mail=="" or $yonetici_telefon=="" or $yonetici_parola==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif(strlen($yonetici_parola)<6){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Parola en az 6 karakter olabilir.';
				$json['uyari'] = '<div class="alert alert-warning">Parola en az 6 karakter olabilir.</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu mail adresi başka bir yöneticiye ait';
				$json['uyari'] = '<div class="alert alert-warning">Bu mail adresi başka bir yöneticiye ait</div>';
			}else{
				
				if($_FILES["yonetici_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["yonetici_resim"]["tmp_name"];
					$resim 		 = $_FILES["yonetici_resim"]["name"];
					$rtipi		 = $_FILES["yonetici_resim"]["type"];
					$rboyut		 = $_FILES["yonetici_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$yonetici_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("yonetici_resimortam")!=""){
					$yonetici_resim = $yonetici_resimortam;	
				}
				
				$query="INSERT INTO ".prefix."_yonetici SET 
				yonetici_ad='$yonetici_ad',
				yonetici_soyad='$yonetici_soyad',
				yonetici_mail='$yonetici_mail',
				yonetici_telefon='$yonetici_telefon',
				yonetici_parola='$yonetici_parolam',
				yonetici_resim='$yonetici_resim',
				yonetici_ekip='$yonetici_ekip',
				yonetici_durum='1'
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
			$yonetici_id=ass(p("yonetici_id"));
			$yonetici_ad=ass(p("yonetici_ad"));
			$yonetici_soyad=ass(p("yonetici_soyad"));
			$yonetici_mail=ass(p("yonetici_mail"));
			$yonetici_telefon=ass(p("yonetici_telefon"));
			$yonetici_ekip=ass(p("yonetici_ekip"));
			$yonetici_parola=ass(p("yonetici_parola"));
			if($yonetici_parola!=""){
				$yonetici_parolam=md5($yonetici_parola);
			}else{
				$yonetici_parolam=ass(p("yonetici_parolam"));
			}
			
			$yonetici_resimortam=ass(p("yonetici_resimortam"));
			
			$kont=rows(query("SELECT * FROM ".prefix."_yonetici WHERE yonetici_mail='$yonetici_mail' and yonetici_id!='$yonetici_id' "));
			
			if($yonetici_ad=="" or $yonetici_mail=="" or $yonetici_telefon==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif(strlen($yonetici_parola)<6 and p("yonetici_parolam")==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Parola en az 6 karakter olabilir.';
				$json['uyari'] = '<div class="alert alert-warning">Parola en az 6 karakter olabilir.</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu mail adresi başka bir yöneticiye ait';
				$json['uyari'] = '<div class="alert alert-warning">Bu mail adresi başka bir yöneticiye ait</div>';
			}else{
				
				if($_FILES["yonetici_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["yonetici_resim"]["tmp_name"];
					$resim 		 = $_FILES["yonetici_resim"]["name"];
					$rtipi		 = $_FILES["yonetici_resim"]["type"];
					$rboyut		 = $_FILES["yonetici_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$yonetici_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("yonetici_resimortam")!=""){
					$yonetici_resim = $yonetici_resimortam;	
				}
				
				$query="UPDATE ".prefix."_yonetici SET 
				yonetici_ad='$yonetici_ad',
				yonetici_soyad='$yonetici_soyad',
				yonetici_mail='$yonetici_mail',
				yonetici_telefon='$yonetici_telefon',
				yonetici_parola='$yonetici_parolam',
				yonetici_resim='$yonetici_resim',
				yonetici_ekip='$yonetici_ekip'
				WHERE yonetici_id='$yonetici_id'";
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
			$oku=row(query("SELECT * FROM ".prefix."_yonetici WHERE yonetici_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["yonetici_durum"]==1){
					query("UPDATE ".prefix."_yonetici SET yonetici_durum='0' WHERE yonetici_id='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_yonetici SET yonetici_durum='1' WHERE yonetici_id='$id'");
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
				query("DELETE FROM ".prefix."_yonetici WHERE yonetici_id='$id'");
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