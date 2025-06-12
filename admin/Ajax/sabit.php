<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "sabit";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sabitsında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$sabit_adi=ass(p("sabit_adi"));
			$sabit_aciklama=ass($_POST["sabit_aciklama"]);
			$sabit_aciklama2=ass($_POST["sabit_aciklama2"]);
			$sabit_aciklama3=ass($_POST["sabit_aciklama3"]);
			$sabit_resimortam=ass(p("sabit_resimortam"));
			$sabit_resim2ortam=ass(p("sabit_resim2ortam"));
			$sabit_resim3ortam=ass(p("sabit_resim3ortam"));
			$sabit_dil=ass(p("sabit_dil"));
			$sabit_gid=ass(p("sabit_gid"));
			
			if($sabit_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				if($_FILES["sabit_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sabit_resim"]["tmp_name"];
					$resim 		 = $_FILES["sabit_resim"]["name"];
					$rtipi		 = $_FILES["sabit_resim"]["type"];
					$rboyut		 = $_FILES["sabit_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$sabit_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sabit_resimortam")!=""){
					$sabit_resim = $sabit_resimortam;	
				}
				if($_FILES["sabit_resim2"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sabit_resim2"]["tmp_name"];
					$resim 		 = $_FILES["sabit_resim2"]["name"];
					$rtipi		 = $_FILES["sabit_resim2"]["type"];
					$rboyut		 = $_FILES["sabit_resim2"]["size"];
					$hedef 		 = "../../app/Images";
					$sabit_resim2=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sabit_resim2ortam")!=""){
					$sabit_resim2 = $sabit_resim2ortam;	
				}
				if($_FILES["sabit_resim3"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sabit_resim3"]["tmp_name"];
					$resim 		 = $_FILES["sabit_resim3"]["name"];
					$rtipi		 = $_FILES["sabit_resim3"]["type"];
					$rboyut		 = $_FILES["sabit_resim3"]["size"];
					$hedef 		 = "../../app/Images";
					$sabit_resim3=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sabit_resim3ortam")!=""){
					$sabit_resim3 = $sabit_resim3ortam;	
				}
				
				$query="INSERT INTO ".prefix."_sabit SET 
				sabit_adi='$sabit_adi',
				sabit_resim='$sabit_resim',
				sabit_resim2='$sabit_resim2',
				sabit_resim3='$sabit_resim3',
				sabit_aciklama='$sabit_aciklama',
				sabit_aciklama2='$sabit_aciklama2',
				sabit_aciklama3='$sabit_aciklama3',
				sabit_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				sabit_durum='1',
				sabit_kayitzaman='".time()."',
				sabit_dil='$sabit_dil',
				sabit_gid='$sabit_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_sabit ORDER BY sabit_id DESC LIMIT 0,1"));
					if($sabit_gid==""){
						query("UPDATE ".prefix."_sabit SET sabit_gid='".$sonid["sabit_id"]."' WHERE sabit_id='".$sonid["sabit_id"]."'");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_sabit ORDER BY sabit_id DESC LIMIT 0,1"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?do=".$ilkkisim."_duzenle&id=".$sonid["sabit_gid"]."&dil=".$sabit_dil;
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
			$sabit_id=ass(p("sabit_id"));
			$sabit_adi=ass(p("sabit_adi"));
			$sabit_aciklama=ass($_POST["sabit_aciklama"]);
			$sabit_aciklama2=ass($_POST["sabit_aciklama2"]);
			$sabit_aciklama3=ass($_POST["sabit_aciklama3"]);
			$sabit_resimortam=ass(p("sabit_resimortam"));
			$sabit_resim2ortam=ass(p("sabit_resim2ortam"));
			$sabit_resim3ortam=ass(p("sabit_resim3ortam"));
			$sabit_dil=ass(p("sabit_dil"));
			$sabit_gid=ass(p("sabit_gid"));
			
			$eski=row(query("SELECT * FROM ".prefix."_sabit WHERE sabit_id='$sabit_id'"));
			
			if($sabit_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				if($_FILES["sabit_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sabit_resim"]["tmp_name"];
					$resim 		 = $_FILES["sabit_resim"]["name"];
					$rtipi		 = $_FILES["sabit_resim"]["type"];
					$rboyut		 = $_FILES["sabit_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$sabit_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sabit_resimortam")!=""){
					$sabit_resim = $sabit_resimortam;	
				}
				if($_FILES["sabit_resim2"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sabit_resim2"]["tmp_name"];
					$resim 		 = $_FILES["sabit_resim2"]["name"];
					$rtipi		 = $_FILES["sabit_resim2"]["type"];
					$rboyut		 = $_FILES["sabit_resim2"]["size"];
					$hedef 		 = "../../app/Images";
					$sabit_resim2=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sabit_resim2ortam")!=""){
					$sabit_resim2 = $sabit_resim2ortam;	
				}
				if($_FILES["sabit_resim3"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sabit_resim3"]["tmp_name"];
					$resim 		 = $_FILES["sabit_resim3"]["name"];
					$rtipi		 = $_FILES["sabit_resim3"]["type"];
					$rboyut		 = $_FILES["sabit_resim3"]["size"];
					$hedef 		 = "../../app/Images";
					$sabit_resim3=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sabit_resim3ortam")!=""){
					$sabit_resim3 = $sabit_resim3ortam;	
				}
				
				$query="UPDATE ".prefix."_sabit SET 
				sabit_adi='$sabit_adi',
				sabit_resim='$sabit_resim',
				sabit_resim2='$sabit_resim2',
				sabit_resim3='$sabit_resim3',
				sabit_aciklama='$sabit_aciklama',
				sabit_aciklama2='$sabit_aciklama2',
				sabit_aciklama3='$sabit_aciklama3'
				WHERE sabit_id='$sabit_id'
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
			$oku=row(query("SELECT * FROM ".prefix."_sabit WHERE sabit_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["sabit_durum"]==1){
					query("UPDATE ".prefix."_sabit SET sabit_durum='0' WHERE sabit_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_sabit SET sabit_durum='1' WHERE sabit_gid='$id'");
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
				query("DELETE FROM ".prefix."_sabit WHERE sabit_gid='$id'");
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