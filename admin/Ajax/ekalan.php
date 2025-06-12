<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "ekalan";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' ekalansında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$ekalan_adi=ass(p("ekalan_adi"));
			$ekalan_tur=ass(p("ekalan_tur"));
			$ekalan_modul=ass(p("ekalan_modul"));
			$modulek=str_replace("ekip_","",p("ekalan_modul"));
			
			$ekalan_sutunadi = $modulek."_".permalink(str_replace(" ","",$ekalan_adi));

			
	
			$kont=rows(query("SELECT * FROM ".prefix."_ekalan WHERE ekalan_sutunadi='$ekalan_sutunadi' and ekalan_modul='$ekalan_modul'"));
			
			if($ekalan_adi=="" or $ekalan_tur=="" or $ekalan_modul==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu sütun adı zaten var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu sütun adı zaten var.</div>';
			}else{
							
				
				$query="INSERT INTO ".prefix."_ekalan SET 
				ekalan_adi='$ekalan_adi',
				ekalan_sutunadi='$ekalan_sutunadi',
				ekalan_tur='$ekalan_tur',
				ekalan_modul='$ekalan_modul'
				";
				$ekle=query($query);
				
					
				if($ekalan_tur==0){
					$alanacquery = "ALTER TABLE `".$ekalan_modul."` ADD `".$ekalan_sutunadi."` VARCHAR(225) NOT NULL";
					$alanac = query($alanacquery);
				}elseif($ekalan_tur==1){
					$alanacquery = "ALTER TABLE `".$ekalan_modul."` ADD `".$ekalan_sutunadi."` TEXT NOT NULL";
					$alanac = query($alanacquery);
				}elseif($ekalan_tur==2){
					$alanacquery = "ALTER TABLE `".$ekalan_modul."` ADD `".$ekalan_sutunadi."` VARCHAR(225) NOT NULL";
					$alanac = query($alanacquery);
				}
				if($alanac){
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
				}else{
					query("DELETE FROM ".prefix."_ekalan WHERE ekalan_sutunadi='$ekalan_sutunadi' and ekalan_modul='$ekalan_modul'");
					$json['tost'] = 'danger';
					$json['mesaj'] = queryalert($alanacquery);
					$json['uyari'] = '<div class="alert alert-danger">'.queryalert($alanacquery).'</div>';
				}
				
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	
	if($ickisim=="durum"){
		if($config["yetki"]["duzenle"]==1){
			$id = p("deger");
			$oku=row(query("SELECT * FROM ".prefix."_ekalan WHERE ekalan_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["ekalan_durum"]==1){
					query("UPDATE ".prefix."_ekalan SET ekalan_durum='0' WHERE ekalan_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_ekalan SET ekalan_durum='1' WHERE ekalan_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_ekalan WHERE ekalan_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("ALTER TABLE `".$oku["ekalan_modul"]."` DROP `".$oku["ekalan_sutunadi"]."`;");
				query("DELETE FROM ".prefix."_ekalan WHERE ekalan_id='$id'");
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