<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "video";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$video_adi=ass(p("video_adi"));
			$video_permalink=ass(p("video_permalink"));
			$video_link=ass(p("video_link"));
			$video_desc=ass(p("video_desc"));
			$video_keyw=ass(p("video_keyw"));
			$video_kategori=ass(p("video_kategori"));
			$video_resimortam=ass(p("video_resimortam"));
			$video_aciklama=ass($_POST["video_aciklama"]);
			$video_dil=ass(p("video_dil"));
			$video_gid=ass(p("video_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($video_permalink==""){
				$video_permalink = permalink($video_adi)."-".rand(1000,9999);
			}else{
				$video_permalink = permalink($video_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$video_permalink' and permalink_dil='$video_dil'"));
			
			if($video_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["video_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["video_resim"]["tmp_name"];
					$resim 		 = $_FILES["video_resim"]["name"];
					$rtipi		 = $_FILES["video_resim"]["type"];
					$rboyut		 = $_FILES["video_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$video_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("video_resimortam")!=""){
					$video_resim = $video_resimortam;	
				}
				$query="INSERT INTO ".prefix."_video SET 
				".implode("",$ekler)."
				video_adi='$video_adi',
				video_permalink='$video_permalink',
				video_link='$video_link',
				video_desc='$video_desc',
				video_keyw='$video_keyw',
				video_kategori='$video_kategori',
				video_resim='$video_resim',
				video_aciklama='$video_aciklama',
				video_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				video_durum='1',
				video_kayitzaman='".time()."',
				video_dil='$video_dil',
				video_gid='$video_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_video WHERE video_permalink='$video_permalink'"));
					if($video_gid==""){
						query("UPDATE ".prefix."_video SET video_gid='".$sonid["video_id"]."' WHERE video_id='".$sonid["video_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["video_id"]."', 
							permalink_link='$video_permalink', 
							permalink_git='$video_permalink', 
							permalink_dil='$video_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_video WHERE video_id='$video_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["video_id"]."', 
							permalink_link='".$orj["video_permalink"]."', 
							permalink_git='$video_permalink', 
							permalink_dil='$video_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_video WHERE video_permalink='$video_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["video_gid"]."&dil=".$video_dil;
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
			$video_id=ass(p("video_id"));
			$video_adi=ass(p("video_adi"));
			$video_permalink=ass(p("video_permalink"));
			$video_link=ass(p("video_link"));
			$video_desc=ass(p("video_desc"));
			$video_keyw=ass(p("video_keyw"));
			$video_kategori=ass(p("video_kategori"));
			$video_resimortam=ass(p("video_resimortam"));
			$video_aciklama=ass($_POST["video_aciklama"]);
			$video_dil=ass(p("video_dil"));
			$video_gid=ass(p("video_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($video_permalink==""){
				$video_permalink = permalink($video_adi)."-".rand(1000,9999);
			}else{
				$video_permalink = permalink($video_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_video WHERE video_id='$video_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$video_permalink' and permalink_dil='$video_dil'"));
			
			if($video_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["video_permalink"]!=$video_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["video_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["video_resim"]["tmp_name"];
					$resim 		 = $_FILES["video_resim"]["name"];
					$rtipi		 = $_FILES["video_resim"]["type"];
					$rboyut		 = $_FILES["video_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$video_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("video_resimortam")!=""){
					$video_resim = $video_resimortam;	
				}
				
				$query="UPDATE ".prefix."_video SET 
				".implode("",$ekler)."
				video_adi='$video_adi',
				video_permalink='$video_permalink',
				video_link='$video_link',
				video_desc='$video_desc',
				video_keyw='$video_keyw',
				video_kategori='$video_kategori',
				video_resim='$video_resim',
				video_aciklama='$video_aciklama'
				WHERE video_id='$video_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["video_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$video_id."', 
					permalink_link='$video_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$video_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$video_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_video WHERE video_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["video_durum"]==1){
					query("UPDATE ".prefix."_video SET video_durum='0' WHERE video_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_video SET video_durum='1' WHERE video_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_video WHERE video_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["video_permalink"]."'");
				query("DELETE FROM ".prefix."_video WHERE video_gid='$id'");
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