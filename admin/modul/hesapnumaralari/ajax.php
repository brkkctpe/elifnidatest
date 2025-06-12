<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "hesapnumaralari";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$hesapnumaralari_adi=ass(p("hesapnumaralari_adi"));
			$hesapnumaralari_banka=ass(p("hesapnumaralari_banka"));
			$hesapnumaralari_iban=ass(p("hesapnumaralari_iban"));
			$hesapnumaralari_hesapsahibi=ass(p("hesapnumaralari_hesapsahibi"));
			$hesapnumaralari_resimortam=ass(p("hesapnumaralari_resimortam"));
			$hesapnumaralari_dil=ass(p("hesapnumaralari_dil"));
			$hesapnumaralari_gid=ass(p("hesapnumaralari_gid"));
			
			if($hesapnumaralari_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				if($_FILES["hesapnumaralari_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["hesapnumaralari_resim"]["tmp_name"];
					$resim 		 = $_FILES["hesapnumaralari_resim"]["name"];
					$rtipi		 = $_FILES["hesapnumaralari_resim"]["type"];
					$rboyut		 = $_FILES["hesapnumaralari_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$hesapnumaralari_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("hesapnumaralari_resimortam")!=""){
					$hesapnumaralari_resim = $hesapnumaralari_resimortam;	
				}
				$query="INSERT INTO ".prefix."_hesapnumaralari SET 
				hesapnumaralari_adi='$hesapnumaralari_adi',
				hesapnumaralari_banka='$hesapnumaralari_banka',
				hesapnumaralari_iban='$hesapnumaralari_iban',
				hesapnumaralari_hesapsahibi='$hesapnumaralari_hesapsahibi',
				hesapnumaralari_resim='$hesapnumaralari_resim',
				hesapnumaralari_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				hesapnumaralari_durum='1',
				hesapnumaralari_kayitzaman='".time()."'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_hesapnumaralari ORDER BY hesapnumaralari_id DESC LIMIT 0,1"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["hesapnumaralari_gid"]."&dil=".$hesapnumaralari_dil;
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
			$hesapnumaralari_id=ass(p("hesapnumaralari_id"));
			$hesapnumaralari_adi=ass(p("hesapnumaralari_adi"));
			$hesapnumaralari_konu=ass(p("hesapnumaralari_konu"));
			$hesapnumaralari_permalink=ass(p("hesapnumaralari_permalink"));
			$hesapnumaralari_resimortam=ass(p("hesapnumaralari_resimortam"));
			$hesapnumaralari_dil=ass(p("hesapnumaralari_dil"));
			$hesapnumaralari_gid=ass(p("hesapnumaralari_gid"));
			
			if($hesapnumaralari_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				
				if($_FILES["hesapnumaralari_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["hesapnumaralari_resim"]["tmp_name"];
					$resim 		 = $_FILES["hesapnumaralari_resim"]["name"];
					$rtipi		 = $_FILES["hesapnumaralari_resim"]["type"];
					$rboyut		 = $_FILES["hesapnumaralari_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$hesapnumaralari_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("hesapnumaralari_resimortam")!=""){
					$hesapnumaralari_resim = $hesapnumaralari_resimortam;	
				}
				
				$query="UPDATE ".prefix."_hesapnumaralari SET 
				hesapnumaralari_adi='$hesapnumaralari_adi',
				hesapnumaralari_banka='$hesapnumaralari_banka',
				hesapnumaralari_iban='$hesapnumaralari_iban',
				hesapnumaralari_hesapsahibi='$hesapnumaralari_hesapsahibi',
				hesapnumaralari_resim='$hesapnumaralari_resim'
				WHERE hesapnumaralari_id='$hesapnumaralari_id'
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
			$oku=row(query("SELECT * FROM ".prefix."_hesapnumaralari WHERE hesapnumaralari_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["hesapnumaralari_durum"]==1){
					query("UPDATE ".prefix."_hesapnumaralari SET hesapnumaralari_durum='0' WHERE hesapnumaralari_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_hesapnumaralari SET hesapnumaralari_durum='1' WHERE hesapnumaralari_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_hesapnumaralari WHERE hesapnumaralari_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["hesapnumaralari_permalink"]."'");
				query("DELETE FROM ".prefix."_hesapnumaralari WHERE hesapnumaralari_gid='$id'");
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