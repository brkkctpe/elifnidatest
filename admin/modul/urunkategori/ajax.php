<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "urunkategori";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$urunkategori_adi=ass(p("urunkategori_adi"));
			$urunkategori_permalink=ass(p("urunkategori_permalink"));
			$urunkategori_desc=ass(p("urunkategori_desc"));
			$urunkategori_keyw=ass(p("urunkategori_keyw"));
			$urunkategori_resimortam=ass(p("urunkategori_resimortam"));
			$urunkategori_resimkortam=ass(p("urunkategori_resimkortam"));
			$urunkategori_aciklama=ass($_POST["urunkategori_aciklama"]);
			$urunkategori_dil=ass(p("urunkategori_dil"));
			$urunkategori_gid=ass(p("urunkategori_gid"));
			$urunkategori_ust=ass(p("urunkategori_ust"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($urunkategori_permalink==""){
				$urunkategori_permalink = permalink($urunkategori_adi)."-".rand(1000,9999);
			}else{
				$urunkategori_permalink = permalink($urunkategori_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$urunkategori_permalink' and permalink_dil='$urunkategori_dil'"));
			
			if($urunkategori_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["urunkategori_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["urunkategori_resim"]["tmp_name"];
					$resim 		 = $_FILES["urunkategori_resim"]["name"];
					$rtipi		 = $_FILES["urunkategori_resim"]["type"];
					$rboyut		 = $_FILES["urunkategori_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$urunkategori_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("urunkategori_resimortam")!=""){
					$urunkategori_resim = $urunkategori_resimortam;	
				}
				if($_FILES["urunkategori_resimk"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["urunkategori_resimk"]["tmp_name"];
					$resim 		 = $_FILES["urunkategori_resimk"]["name"];
					$rtipi		 = $_FILES["urunkategori_resimk"]["type"];
					$rboyut		 = $_FILES["urunkategori_resimk"]["size"];
					$hedef 		 = "../../app/Images";
					$urunkategori_resimk=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("urunkategori_resimkortam")!=""){
					$urunkategori_resimk = $urunkategori_resimkortam;	
				}
				$query="INSERT INTO ".prefix."_urunkategori SET 
				".implode("",$ekler)."
				urunkategori_adi='$urunkategori_adi',
				urunkategori_permalink='$urunkategori_permalink',
				urunkategori_desc='$urunkategori_desc',
				urunkategori_keyw='$urunkategori_keyw',
				urunkategori_resim='$urunkategori_resim',
				urunkategori_resimk='$urunkategori_resimk',
				urunkategori_aciklama='$urunkategori_aciklama',
				urunkategori_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				urunkategori_durum='1',
				urunkategori_kayitzaman='".time()."',
				urunkategori_ust='$urunkategori_ust',
				urunkategori_dil='$urunkategori_dil',
				urunkategori_gid='$urunkategori_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_permalink='$urunkategori_permalink'"));
					if($urunkategori_gid==""){
						query("UPDATE ".prefix."_urunkategori SET urunkategori_gid='".$sonid["urunkategori_id"]."' WHERE urunkategori_id='".$sonid["urunkategori_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["urunkategori_id"]."', 
							permalink_link='$urunkategori_permalink', 
							permalink_git='$urunkategori_permalink', 
							permalink_dil='$urunkategori_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_id='$urunkategori_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["urunkategori_id"]."', 
							permalink_link='".$orj["urunkategori_permalink"]."', 
							permalink_git='$urunkategori_permalink', 
							permalink_dil='$urunkategori_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_permalink='$urunkategori_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["urunkategori_gid"]."&dil=".$urunkategori_dil;
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
			$urunkategori_id=ass(p("urunkategori_id"));
			$urunkategori_adi=ass(p("urunkategori_adi"));
			$urunkategori_permalink=ass(p("urunkategori_permalink"));
			$urunkategori_desc=ass(p("urunkategori_desc"));
			$urunkategori_keyw=ass(p("urunkategori_keyw"));
			$urunkategori_resimortam=ass(p("urunkategori_resimortam"));
			$urunkategori_resimkortam=ass(p("urunkategori_resimkortam"));
			$urunkategori_aciklama=ass($_POST["urunkategori_aciklama"]);
			$urunkategori_dil=ass(p("urunkategori_dil"));
			$urunkategori_gid=ass(p("urunkategori_gid"));
			$urunkategori_ust=ass(p("urunkategori_ust"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($urunkategori_permalink==""){
				$urunkategori_permalink = permalink($urunkategori_adi)."-".rand(1000,9999);
			}else{
				$urunkategori_permalink = permalink($urunkategori_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_id='$urunkategori_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$urunkategori_permalink' and permalink_dil='$urunkategori_dil'"));
			
			if($urunkategori_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["urunkategori_permalink"]!=$urunkategori_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["urunkategori_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["urunkategori_resim"]["tmp_name"];
					$resim 		 = $_FILES["urunkategori_resim"]["name"];
					$rtipi		 = $_FILES["urunkategori_resim"]["type"];
					$rboyut		 = $_FILES["urunkategori_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$urunkategori_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("urunkategori_resimortam")!=""){
					$urunkategori_resim = $urunkategori_resimortam;	
				}
				if($_FILES["urunkategori_resimk"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["urunkategori_resimk"]["tmp_name"];
					$resim 		 = $_FILES["urunkategori_resimk"]["name"];
					$rtipi		 = $_FILES["urunkategori_resimk"]["type"];
					$rboyut		 = $_FILES["urunkategori_resimk"]["size"];
					$hedef 		 = "../../app/Images";
					$urunkategori_resimk=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("urunkategori_resimkortam")!=""){
					$urunkategori_resimk = $urunkategori_resimkortam;	
				}
				
				$query="UPDATE ".prefix."_urunkategori SET 
				".implode("",$ekler)."
				urunkategori_adi='$urunkategori_adi',
				urunkategori_permalink='$urunkategori_permalink',
				urunkategori_desc='$urunkategori_desc',
				urunkategori_keyw='$urunkategori_keyw',
				urunkategori_resim='$urunkategori_resim',
				urunkategori_resimk='$urunkategori_resimk',
				urunkategori_aciklama='$urunkategori_aciklama',
				urunkategori_ust='$urunkategori_ust'
				WHERE urunkategori_id='$urunkategori_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["urunkategori_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$urunkategori_id."', 
					permalink_link='$urunkategori_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$urunkategori_id."', 
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_git='$urunkategori_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["urunkategori_durum"]==1){
					query("UPDATE ".prefix."_urunkategori SET urunkategori_durum='0' WHERE urunkategori_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_urunkategori SET urunkategori_durum='1' WHERE urunkategori_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_urunkategori WHERE urunkategori_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["urunkategori_permalink"]."'");
				query("DELETE FROM ".prefix."_urunkategori WHERE urunkategori_gid='$id'");
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