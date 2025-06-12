<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "bayiler";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$bayiler_adi=ass(p("bayiler_adi"));
			$bayiler_permalink=ass(p("bayiler_permalink"));
			$bayiler_desc=ass(p("bayiler_desc"));
			$bayiler_keyw=ass(p("bayiler_keyw"));
			$bayiler_resimortam=ass(p("bayiler_resimortam"));
			$bayiler_aciklama=ass($_POST["bayiler_aciklama"]);
			$bayiler_dil=ass(p("bayiler_dil"));
			$bayiler_gid=ass(p("bayiler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($bayiler_permalink==""){
				$bayiler_permalink = permalink($bayiler_adi)."-".rand(1000,9999);
			}else{
				$bayiler_permalink = permalink($bayiler_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$bayiler_permalink' and permalink_dil='$bayiler_dil'"));
			
			if($bayiler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["bayiler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["bayiler_resim"]["tmp_name"];
					$resim 		 = $_FILES["bayiler_resim"]["name"];
					$rtipi		 = $_FILES["bayiler_resim"]["type"];
					$rboyut		 = $_FILES["bayiler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$bayiler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("bayiler_resimortam")!=""){
					$bayiler_resim = $bayiler_resimortam;	
				}
				$query="INSERT INTO ".prefix."_bayiler SET 
				".implode("",$ekler)."
				bayiler_adi='$bayiler_adi',
				bayiler_permalink='$bayiler_permalink',
				bayiler_desc='$bayiler_desc',
				bayiler_keyw='$bayiler_keyw',
				bayiler_resim='$bayiler_resim',
				bayiler_aciklama='$bayiler_aciklama',
				bayiler_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				bayiler_durum='1',
				bayiler_kayitzaman='".time()."',
				bayiler_dil='$bayiler_dil',
				bayiler_gid='$bayiler_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_bayiler WHERE bayiler_permalink='$bayiler_permalink'"));
					if($bayiler_gid==""){
						query("UPDATE ".prefix."_bayiler SET bayiler_gid='".$sonid["bayiler_id"]."' WHERE bayiler_id='".$sonid["bayiler_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["bayiler_id"]."', 
							permalink_link='$bayiler_permalink', 
							permalink_git='$bayiler_permalink', 
							permalink_dil='$bayiler_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_bayiler WHERE bayiler_id='$bayiler_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["bayiler_id"]."', 
							permalink_link='".$orj["bayiler_permalink"]."', 
							permalink_git='$bayiler_permalink', 
							permalink_dil='$bayiler_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_bayiler WHERE bayiler_permalink='$bayiler_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["bayiler_gid"]."&dil=".$bayiler_dil;
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
			$bayiler_id=ass(p("bayiler_id"));
			$bayiler_adi=ass(p("bayiler_adi"));
			$bayiler_permalink=ass(p("bayiler_permalink"));
			$bayiler_desc=ass(p("bayiler_desc"));
			$bayiler_keyw=ass(p("bayiler_keyw"));
			$bayiler_resimortam=ass(p("bayiler_resimortam"));
			$bayiler_aciklama=ass($_POST["bayiler_aciklama"]);
			$bayiler_dil=ass(p("bayiler_dil"));
			$bayiler_gid=ass(p("bayiler_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($bayiler_permalink==""){
				$bayiler_permalink = permalink($bayiler_adi)."-".rand(1000,9999);
			}else{
				$bayiler_permalink = permalink($bayiler_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_bayiler WHERE bayiler_id='$bayiler_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$bayiler_permalink' and permalink_dil='$bayiler_dil'"));
			
			if($bayiler_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["bayiler_permalink"]!=$bayiler_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["bayiler_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["bayiler_resim"]["tmp_name"];
					$resim 		 = $_FILES["bayiler_resim"]["name"];
					$rtipi		 = $_FILES["bayiler_resim"]["type"];
					$rboyut		 = $_FILES["bayiler_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$bayiler_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("bayiler_resimortam")!=""){
					$bayiler_resim = $bayiler_resimortam;	
				}
				
				$query="UPDATE ".prefix."_bayiler SET 
				".implode("",$ekler)."
				bayiler_adi='$bayiler_adi',
				bayiler_permalink='$bayiler_permalink',
				bayiler_desc='$bayiler_desc',
				bayiler_keyw='$bayiler_keyw',
				bayiler_resim='$bayiler_resim',
				bayiler_aciklama='$bayiler_aciklama'
				WHERE bayiler_id='$bayiler_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["bayiler_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$bayiler_id."', 
					permalink_link='$bayiler_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$bayiler_id."', 
					permalink_git='$bayiler_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_bayiler WHERE bayiler_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["bayiler_durum"]==1){
					query("UPDATE ".prefix."_bayiler SET bayiler_durum='0' WHERE bayiler_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_bayiler SET bayiler_durum='1' WHERE bayiler_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_bayiler WHERE bayiler_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["bayiler_permalink"]."'");
				query("DELETE FROM ".prefix."_bayiler WHERE bayiler_gid='$id'");
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