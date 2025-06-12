<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "sayfa";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$sayfa_adi=ass(p("sayfa_adi"));
			$sayfa_permalink=ass(p("sayfa_permalink"));
			$sayfa_desc=ass(p("sayfa_desc"));
			$sayfa_keyw=ass(p("sayfa_keyw"));
			$sayfa_gitlink=ass(p("sayfa_gitlink"));
			$sayfa_modul=ass(p("sayfa_modul"));
			$sayfa_resimortam=ass(p("sayfa_resimortam"));
			$sayfa_resim2ortam=ass(p("sayfa_resim2ortam"));
			$sayfa_resim3ortam=ass(p("sayfa_resim3ortam"));
			$sayfa_aciklama=ass($_POST["sayfa_aciklama"]);
			$sayfa_aciklama2=ass($_POST["sayfa_aciklama2"]);
			$sayfa_aciklama3=ass($_POST["sayfa_aciklama3"]);
			$sayfa_dil=ass(p("sayfa_dil"));
			$sayfa_gid=ass(p("sayfa_gid"));
			
			if($sayfa_permalink==""){
				$sayfa_permalink = permalink($sayfa_adi)."-".rand(1000,9999);
			}else{
				$sayfa_permalink = permalink($sayfa_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$sayfa_permalink' and permalink_dil='$sayfa_dil'"));
			
			if($sayfa_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["sayfa_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sayfa_resim"]["tmp_name"];
					$resim 		 = $_FILES["sayfa_resim"]["name"];
					$rtipi		 = $_FILES["sayfa_resim"]["type"];
					$rboyut		 = $_FILES["sayfa_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$sayfa_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sayfa_resimortam")!=""){
					$sayfa_resim = $sayfa_resimortam;	
				}
				if($_FILES["sayfa_resim2"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sayfa_resim2"]["tmp_name"];
					$resim 		 = $_FILES["sayfa_resim2"]["name"];
					$rtipi		 = $_FILES["sayfa_resim2"]["type"];
					$rboyut		 = $_FILES["sayfa_resim2"]["size"];
					$hedef 		 = "../../app/Images";
					$sayfa_resim2=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sayfa_resim2ortam")!=""){
					$sayfa_resim2 = $sayfa_resim2ortam;	
				}
				if($_FILES["sayfa_resim3"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sayfa_resim3"]["tmp_name"];
					$resim 		 = $_FILES["sayfa_resim3"]["name"];
					$rtipi		 = $_FILES["sayfa_resim3"]["type"];
					$rboyut		 = $_FILES["sayfa_resim3"]["size"];
					$hedef 		 = "../../app/Images";
					$sayfa_resim3=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sayfa_resim3ortam")!=""){
					$sayfa_resim3 = $sayfa_resim3ortam;	
				}
				$query="INSERT INTO ".prefix."_sayfa SET 
				sayfa_adi='$sayfa_adi',
				sayfa_permalink='$sayfa_permalink',
				sayfa_desc='$sayfa_desc',
				sayfa_keyw='$sayfa_keyw',
				sayfa_gitlink='$sayfa_gitlink',
				sayfa_modul='$sayfa_modul',
				sayfa_resim='$sayfa_resim',
				sayfa_resim2='$sayfa_resim2',
				sayfa_resim3='$sayfa_resim3',
				sayfa_aciklama='$sayfa_aciklama',
				sayfa_aciklama2='$sayfa_aciklama2',
				sayfa_aciklama3='$sayfa_aciklama3',
				sayfa_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				sayfa_durum='1',
				sayfa_kayitzaman='".time()."',
				sayfa_dil='$sayfa_dil',
				sayfa_gid='$sayfa_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_permalink='$sayfa_permalink'"));
					if($sayfa_gid==""){
						query("UPDATE ".prefix."_sayfa SET sayfa_gid='".$sonid["sayfa_id"]."' WHERE sayfa_id='".$sonid["sayfa_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["sayfa_id"]."', 
							permalink_link='$sayfa_permalink', 
							permalink_git='$sayfa_permalink', 
							permalink_dil='$sayfa_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_id='$sayfa_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["sayfa_id"]."', 
							permalink_link='".$orj["sayfa_permalink"]."', 
							permalink_git='$sayfa_permalink', 
							permalink_dil='$sayfa_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_permalink='$sayfa_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?do=".$ilkkisim."_duzenle&id=".$sonid["sayfa_gid"]."&dil=".$sayfa_dil;
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
			$sayfa_id=ass(p("sayfa_id"));
			$sayfa_adi=ass(p("sayfa_adi"));
			$sayfa_permalink=ass(p("sayfa_permalink"));
			$sayfa_desc=ass(p("sayfa_desc"));
			$sayfa_keyw=ass(p("sayfa_keyw"));
			$sayfa_gitlink=ass(p("sayfa_gitlink"));
			$sayfa_modul=ass(p("sayfa_modul"));
			$sayfa_resimortam=ass(p("sayfa_resimortam"));
			$sayfa_resim2ortam=ass(p("sayfa_resim2ortam"));
			$sayfa_resim3ortam=ass(p("sayfa_resim3ortam"));
			$sayfa_aciklama=ass($_POST["sayfa_aciklama"]);
			$sayfa_aciklama2=ass($_POST["sayfa_aciklama2"]);
			$sayfa_aciklama3=ass($_POST["sayfa_aciklama3"]);
			$sayfa_dil=ass(p("sayfa_dil"));
			$sayfa_gid=ass(p("sayfa_gid"));
			
			if($sayfa_permalink==""){
				$sayfa_permalink = permalink($sayfa_adi)."-".rand(1000,9999);
			}else{
				$sayfa_permalink = permalink($sayfa_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_id='$sayfa_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$sayfa_permalink' and permalink_dil='$sayfa_dil'"));
			
			if($sayfa_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["sayfa_permalink"]!=$sayfa_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["sayfa_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sayfa_resim"]["tmp_name"];
					$resim 		 = $_FILES["sayfa_resim"]["name"];
					$rtipi		 = $_FILES["sayfa_resim"]["type"];
					$rboyut		 = $_FILES["sayfa_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$sayfa_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sayfa_resimortam")!=""){
					$sayfa_resim = $sayfa_resimortam;	
				}
				if($_FILES["sayfa_resim2"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sayfa_resim2"]["tmp_name"];
					$resim 		 = $_FILES["sayfa_resim2"]["name"];
					$rtipi		 = $_FILES["sayfa_resim2"]["type"];
					$rboyut		 = $_FILES["sayfa_resim2"]["size"];
					$hedef 		 = "../../app/Images";
					$sayfa_resim2=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sayfa_resim2ortam")!=""){
					$sayfa_resim2 = $sayfa_resim2ortam;	
				}
				if($_FILES["sayfa_resim3"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["sayfa_resim3"]["tmp_name"];
					$resim 		 = $_FILES["sayfa_resim3"]["name"];
					$rtipi		 = $_FILES["sayfa_resim3"]["type"];
					$rboyut		 = $_FILES["sayfa_resim3"]["size"];
					$hedef 		 = "../../app/Images";
					$sayfa_resim3=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("sayfa_resim3ortam")!=""){
					$sayfa_resim3 = $sayfa_resim3ortam;	
				}
				
				$query="UPDATE ".prefix."_sayfa SET 
				sayfa_adi='$sayfa_adi',
				sayfa_permalink='$sayfa_permalink',
				sayfa_desc='$sayfa_desc',
				sayfa_keyw='$sayfa_keyw',
				sayfa_gitlink='$sayfa_gitlink',
				sayfa_modul='$sayfa_modul',
				sayfa_resim='$sayfa_resim',
				sayfa_resim2='$sayfa_resim2',
				sayfa_resim3='$sayfa_resim3',
				sayfa_aciklama='$sayfa_aciklama',
				sayfa_aciklama2='$sayfa_aciklama2',
				sayfa_aciklama3='$sayfa_aciklama3'
				WHERE sayfa_id='$sayfa_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["sayfa_permalink"];
					query("UPDATE ".prefix."_permalink SET 
					permalink_modulid='".$sayfa_id."', 
					permalink_link='$sayfa_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$sayfa_id."', 
					permalink_git='$sayfa_permalink'
					WHERE permalink_git='$eski_permalink'");
					
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
			$oku=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["sayfa_durum"]==1){
					query("UPDATE ".prefix."_sayfa SET sayfa_durum='0' WHERE sayfa_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_sayfa SET sayfa_durum='1' WHERE sayfa_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_sayfa WHERE sayfa_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["sayfa_permalink"]."'");
				query("DELETE FROM ".prefix."_sayfa WHERE sayfa_gid='$id'");
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