<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "rutbe";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$rutbe_adi=ass(p("rutbe_adi"));
			$rutbe_ekle=ass(p("rutbe_ekle"));
			$rutbe_duzenle=ass(p("rutbe_duzenle"));
			$rutbe_sil=ass(p("rutbe_sil"));
			$rutbe_sayfa=serialize($_POST["rutbe_sayfa"]);
			
			$kont=rows(query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_adi='$rutbe_adi'"));
			
			if($rutbe_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu isimde bir rütbe var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu isimde bir rütbe var.</div>';
			}else{
				$query="INSERT INTO ".prefix."_rutbe SET 
				rutbe_adi='$rutbe_adi',
				rutbe_ekle='$rutbe_ekle',
				rutbe_duzenle='$rutbe_duzenle',
				rutbe_sil='$rutbe_sil',
				rutbe_sayfa='$rutbe_sayfa',
				rutbe_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				rutbe_durum='1',
				rutbe_kayitzaman='".time()."'
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
			$rutbe_id=ass(p("rutbe_id"));
			$rutbe_adi=ass(p("rutbe_adi"));
			$rutbe_ekle=ass(p("rutbe_ekle"));
			$rutbe_duzenle=ass(p("rutbe_duzenle"));
			$rutbe_sil=ass(p("rutbe_sil"));
			$rutbe_sayfa=serialize($_POST["rutbe_sayfa"]);
			
			$kont=rows(query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_adi='$rutbe_adi' and rutbe_id!='$rutbe_id'"));
			
			if($rutbe_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu isimde bir rütbe var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu isimde bir rütbe var.</div>';
			}else{
				$query="UPDATE ".prefix."_rutbe SET 
				rutbe_adi='$rutbe_adi',
				rutbe_ekle='$rutbe_ekle',
				rutbe_duzenle='$rutbe_duzenle',
				rutbe_sil='$rutbe_sil',
				rutbe_sayfa='$rutbe_sayfa'
				WHERE rutbe_id='$rutbe_id'
				";
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
			$oku=row(query("SELECT * FROM ".prefix."_rutbe WHERE rutbe_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["rutbe_durum"]==1){
					query("UPDATE ".prefix."_rutbe SET rutbe_durum='0' WHERE rutbe_id='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_rutbe SET rutbe_durum='1' WHERE rutbe_id='$id'");
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
				query("DELETE FROM ".prefix."_rutbe WHERE rutbe_id='$id'");
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