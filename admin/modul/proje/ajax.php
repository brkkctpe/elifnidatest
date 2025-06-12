<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "proje";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$proje_adi=ass(p("proje_adi"));
			$proje_permalink=ass(p("proje_permalink"));
			$proje_desc=ass(p("proje_desc"));
			$proje_keyw=ass(p("proje_keyw"));
			$proje_resimortam=ass(p("proje_resimortam"));
			$proje_aciklama=ass($_POST["proje_aciklama"]);
			$proje_dil=ass(p("proje_dil"));
			$proje_gid=ass(p("proje_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($proje_permalink==""){
				$proje_permalink = permalink($proje_adi)."-".rand(1000,9999);
			}else{
				$proje_permalink = permalink($proje_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$proje_permalink' and permalink_dil='$proje_dil'"));
			
			if($proje_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["proje_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["proje_resim"]["tmp_name"];
					$resim 		 = $_FILES["proje_resim"]["name"];
					$rtipi		 = $_FILES["proje_resim"]["type"];
					$rboyut		 = $_FILES["proje_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$proje_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("proje_resimortam")!=""){
					$proje_resim = $proje_resimortam;	
				}
				$query="INSERT INTO ".prefix."_proje SET 
				".implode("",$ekler)."
				proje_adi='$proje_adi',
				proje_permalink='$proje_permalink',
				proje_desc='$proje_desc',
				proje_keyw='$proje_keyw',
				proje_resim='$proje_resim',
				proje_aciklama='$proje_aciklama',
				proje_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				proje_durum='1',
				proje_kayitzaman='".time()."',
				proje_dil='$proje_dil',
				proje_gid='$proje_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_proje WHERE proje_permalink='$proje_permalink'"));
					if($proje_gid==""){
						query("UPDATE ".prefix."_proje SET proje_gid='".$sonid["proje_id"]."' WHERE proje_id='".$sonid["proje_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["proje_id"]."', 
							permalink_link='$proje_permalink', 
							permalink_git='$proje_permalink', 
							permalink_dil='$proje_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_proje WHERE proje_id='$proje_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["proje_id"]."', 
							permalink_link='".$orj["proje_permalink"]."', 
							permalink_git='$proje_permalink', 
							permalink_dil='$proje_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_proje WHERE proje_permalink='$proje_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["proje_gid"]."&dil=".$proje_dil;
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
			$proje_id=ass(p("proje_id"));
			$proje_adi=ass(p("proje_adi"));
			$proje_permalink=ass(p("proje_permalink"));
			$proje_desc=ass(p("proje_desc"));
			$proje_keyw=ass(p("proje_keyw"));
			$proje_resimortam=ass(p("proje_resimortam"));
			$proje_aciklama=ass($_POST["proje_aciklama"]);
			$proje_dil=ass(p("proje_dil"));
			$proje_gid=ass(p("proje_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($proje_permalink==""){
				$proje_permalink = permalink($proje_adi)."-".rand(1000,9999);
			}else{
				$proje_permalink = permalink($proje_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_proje WHERE proje_id='$proje_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$proje_permalink' and permalink_dil='$proje_dil'"));
			
			if($proje_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["proje_permalink"]!=$proje_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["proje_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["proje_resim"]["tmp_name"];
					$resim 		 = $_FILES["proje_resim"]["name"];
					$rtipi		 = $_FILES["proje_resim"]["type"];
					$rboyut		 = $_FILES["proje_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$proje_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("proje_resimortam")!=""){
					$proje_resim = $proje_resimortam;	
				}
				
				$query="UPDATE ".prefix."_proje SET 
				".implode("",$ekler)."
				proje_adi='$proje_adi',
				proje_permalink='$proje_permalink',
				proje_desc='$proje_desc',
				proje_keyw='$proje_keyw',
				proje_resim='$proje_resim',
				proje_aciklama='$proje_aciklama'
				WHERE proje_id='$proje_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["proje_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$proje_id."', 
					permalink_link='$proje_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$proje_id."', 
					permalink_git='$proje_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_proje WHERE proje_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["proje_durum"]==1){
					query("UPDATE ".prefix."_proje SET proje_durum='0' WHERE proje_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_proje SET proje_durum='1' WHERE proje_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_proje WHERE proje_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["proje_permalink"]."'");
				query("DELETE FROM ".prefix."_proje WHERE proje_gid='$id'");
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