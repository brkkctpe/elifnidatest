<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "kupon";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$kupon_adi=ass(p("kupon_adi"));
			$kupon_kod=permalink(p("kupon_kod"));
			$kupon_indirim=ass(p("kupon_indirim"));
			$kupon_yuzde=ass(p("kupon_yuzde"));
			
			$kont=rows(query("SELECT * FROM ".prefix."_kupon WHERE kupon_kod='$kupon_kod' and kupon_durum='1'"));
			
			if($kupon_adi=="" or $kupon_kod==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu kupon koduzaten ekli.';
				$json['uyari'] = '<div class="alert alert-warning">Bu kupon koduzaten ekli.</div>';
			}else{
				$query="INSERT INTO ".prefix."_kupon SET 
				kupon_adi='$kupon_adi',
				kupon_kod='$kupon_kod',
				kupon_indirim='$kupon_indirim',
				kupon_yuzde='$kupon_yuzde',
				kupon_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				kupon_durum='1',
				kupon_kayitzaman='".time()."'
				";
				$ekle=query($query);
				if($ekle){
					
					$sonid = row(query("SELECT * FROM ".prefix."_kupon WHERE kupon_kod='$kupon_kod' and kupon_durum='1'"));
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["kupon_gid"];
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
			$kupon_id=ass(p("kupon_id"));
			$kupon_adi=ass(p("kupon_adi"));
			$kupon_kod=permalink(p("kupon_kod"));
			$kupon_indirim=ass(p("kupon_indirim"));
			$kupon_yuzde=ass(p("kupon_yuzde"));
			
			if($kupon_permalink==""){
				$kupon_permalink = permalink($kupon_adi)."-".rand(1000,9999);
			}else{
				$kupon_permalink = permalink($kupon_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_kupon WHERE kupon_kod='$kupon_kod' and kupon_durum='1' and kupon_id!='$kupon_id'"));
			
			if($kupon_adi=="" or $kupon_kod==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu kupon koduzaten ekli.';
				$json['uyari'] = '<div class="alert alert-warning">Bu kupon koduzaten ekli.</div>';
			}else{
				
				
				$query="UPDATE ".prefix."_kupon SET  
				kupon_adi='$kupon_adi',
				kupon_kod='$kupon_kod',
				kupon_indirim='$kupon_indirim',
				kupon_yuzde='$kupon_yuzde'
				WHERE kupon_id='$kupon_id'
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
			$oku=row(query("SELECT * FROM ".prefix."_kupon WHERE kupon_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["kupon_durum"]==1){
					query("UPDATE ".prefix."_kupon SET kupon_durum='0' WHERE kupon_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_kupon SET kupon_durum='1' WHERE kupon_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_kupon WHERE kupon_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["kupon_permalink"]."'");
				query("DELETE FROM ".prefix."_kupon WHERE kupon_gid='$id'");
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