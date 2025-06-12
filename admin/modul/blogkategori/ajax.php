<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "blogkategori";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$blogkategori_adi=ass(p("blogkategori_adi"));
			$blogkategori_permalink=ass(p("blogkategori_permalink"));
			$blogkategori_desc=ass(p("blogkategori_desc"));
			$blogkategori_keyw=ass(p("blogkategori_keyw"));
			$blogkategori_resimortam=ass(p("blogkategori_resimortam"));
			$blogkategori_aciklama=ass($_POST["blogkategori_aciklama"]);
			$blogkategori_dil=ass(p("blogkategori_dil"));
			$blogkategori_gid=ass(p("blogkategori_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($blogkategori_permalink==""){
				$blogkategori_permalink = permalink($blogkategori_adi)."-".rand(1000,9999);
			}else{
				$blogkategori_permalink = permalink($blogkategori_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$blogkategori_permalink' and permalink_dil='$blogkategori_dil'"));
			
			if($blogkategori_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["blogkategori_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["blogkategori_resim"]["tmp_name"];
					$resim 		 = $_FILES["blogkategori_resim"]["name"];
					$rtipi		 = $_FILES["blogkategori_resim"]["type"];
					$rboyut		 = $_FILES["blogkategori_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$blogkategori_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("blogkategori_resimortam")!=""){
					$blogkategori_resim = $blogkategori_resimortam;	
				}
				$query="INSERT INTO ".prefix."_blogkategori SET 
				".implode("",$ekler)."
				blogkategori_adi='$blogkategori_adi',
				blogkategori_permalink='$blogkategori_permalink',
				blogkategori_desc='$blogkategori_desc',
				blogkategori_keyw='$blogkategori_keyw',
				blogkategori_resim='$blogkategori_resim',
				blogkategori_aciklama='$blogkategori_aciklama',
				blogkategori_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				blogkategori_durum='1',
				blogkategori_kayitzaman='".time()."',
				blogkategori_dil='$blogkategori_dil',
				blogkategori_gid='$blogkategori_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_blogkategori WHERE blogkategori_permalink='$blogkategori_permalink'"));
					if($blogkategori_gid==""){
						query("UPDATE ".prefix."_blogkategori SET blogkategori_gid='".$sonid["blogkategori_id"]."' WHERE blogkategori_id='".$sonid["blogkategori_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["blogkategori_id"]."', 
							permalink_link='$blogkategori_permalink', 
							permalink_git='$blogkategori_permalink', 
							permalink_dil='$blogkategori_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_blogkategori WHERE blogkategori_id='$blogkategori_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["blogkategori_id"]."', 
							permalink_link='".$orj["blogkategori_permalink"]."', 
							permalink_git='$blogkategori_permalink', 
							permalink_dil='$blogkategori_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_blogkategori WHERE blogkategori_permalink='$blogkategori_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["blogkategori_gid"]."&dil=".$blogkategori_dil;
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
			$blogkategori_id=ass(p("blogkategori_id"));
			$blogkategori_adi=ass(p("blogkategori_adi"));
			$blogkategori_permalink=ass(p("blogkategori_permalink"));
			$blogkategori_desc=ass(p("blogkategori_desc"));
			$blogkategori_keyw=ass(p("blogkategori_keyw"));
			$blogkategori_resimortam=ass(p("blogkategori_resimortam"));
			$blogkategori_aciklama=ass($_POST["blogkategori_aciklama"]);
			$blogkategori_dil=ass(p("blogkategori_dil"));
			$blogkategori_gid=ass(p("blogkategori_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($blogkategori_permalink==""){
				$blogkategori_permalink = permalink($blogkategori_adi)."-".rand(1000,9999);
			}else{
				$blogkategori_permalink = permalink($blogkategori_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_blogkategori WHERE blogkategori_id='$blogkategori_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$blogkategori_permalink' and permalink_dil='$blogkategori_dil'"));
			
			if($blogkategori_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["blogkategori_permalink"]!=$blogkategori_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["blogkategori_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["blogkategori_resim"]["tmp_name"];
					$resim 		 = $_FILES["blogkategori_resim"]["name"];
					$rtipi		 = $_FILES["blogkategori_resim"]["type"];
					$rboyut		 = $_FILES["blogkategori_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$blogkategori_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("blogkategori_resimortam")!=""){
					$blogkategori_resim = $blogkategori_resimortam;	
				}
				
				$query="UPDATE ".prefix."_blogkategori SET 
				".implode("",$ekler)."
				blogkategori_adi='$blogkategori_adi',
				blogkategori_permalink='$blogkategori_permalink',
				blogkategori_desc='$blogkategori_desc',
				blogkategori_keyw='$blogkategori_keyw',
				blogkategori_resim='$blogkategori_resim',
				blogkategori_aciklama='$blogkategori_aciklama'
				WHERE blogkategori_id='$blogkategori_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["blogkategori_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$blogkategori_id."', 
					permalink_link='$blogkategori_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$blogkategori_id."', 
					permalink_git='$blogkategori_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_blogkategori WHERE blogkategori_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["blogkategori_durum"]==1){
					query("UPDATE ".prefix."_blogkategori SET blogkategori_durum='0' WHERE blogkategori_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_blogkategori SET blogkategori_durum='1' WHERE blogkategori_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_blogkategori WHERE blogkategori_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["blogkategori_permalink"]."'");
				query("DELETE FROM ".prefix."_blogkategori WHERE blogkategori_gid='$id'");
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