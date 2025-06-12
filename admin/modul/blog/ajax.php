<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "blog";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' sayfasında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$blog_adi=ass(p("blog_adi"));
			$blog_permalink=ass(p("blog_permalink"));
			$blog_desc=ass(p("blog_desc"));
			$blog_keyw=ass(p("blog_keyw"));
			$blog_kategori=ass(p("blog_kategori"));
			$blog_resimortam=ass(p("blog_resimortam"));
			$blog_aciklama=ass($_POST["blog_aciklama"]);
			$blog_dil=ass(p("blog_dil"));
			$blog_gid=ass(p("blog_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($blog_permalink==""){
				$blog_permalink = permalink($blog_adi)."-".rand(1000,9999);
			}else{
				$blog_permalink = permalink($blog_permalink);
			}
			
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_git='$blog_permalink' and permalink_dil='$blog_dil'"));
			
			if($blog_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				if($_FILES["blog_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["blog_resim"]["tmp_name"];
					$resim 		 = $_FILES["blog_resim"]["name"];
					$rtipi		 = $_FILES["blog_resim"]["type"];
					$rboyut		 = $_FILES["blog_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$blog_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("blog_resimortam")!=""){
					$blog_resim = $blog_resimortam;	
				}
				$query="INSERT INTO ".prefix."_blog SET 
				".implode("",$ekler)."
				blog_adi='$blog_adi',
				blog_permalink='$blog_permalink',
				blog_desc='$blog_desc',
				blog_keyw='$blog_keyw',
				blog_kategori='$blog_kategori',
				blog_resim='$blog_resim',
				blog_aciklama='$blog_aciklama',
				blog_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				blog_durum='1',
				blog_kayitzaman='".time()."',
				blog_dil='$blog_dil',
				blog_gid='$blog_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_blog WHERE blog_permalink='$blog_permalink'"));
					if($blog_gid==""){
						query("UPDATE ".prefix."_blog SET blog_gid='".$sonid["blog_id"]."' WHERE blog_id='".$sonid["blog_id"]."'");
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["blog_id"]."', 
							permalink_link='$blog_permalink', 
							permalink_git='$blog_permalink', 
							permalink_dil='$blog_dil' 
						");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_blog WHERE blog_id='$blog_gid'"));
						query("INSERT INTO ".prefix."_permalink SET 
							permalink_adi='".$sonid[$ilkkisim."_adi"]."', 
							permalink_modulid='".$sonid["blog_id"]."', 
							permalink_link='".$orj["blog_permalink"]."', 
							permalink_git='$blog_permalink', 
							permalink_dil='$blog_dil' 
						");
					}
					$sonid = row(query("SELECT * FROM ".prefix."_blog WHERE blog_permalink='$blog_permalink'"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?mo=".$ilkkisim."_duzenle&id=".$sonid["blog_gid"]."&dil=".$blog_dil;
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
			$blog_id=ass(p("blog_id"));
			$blog_adi=ass(p("blog_adi"));
			$blog_permalink=ass(p("blog_permalink"));
			$blog_desc=ass(p("blog_desc"));
			$blog_keyw=ass(p("blog_keyw"));
			$blog_kategori=ass(p("blog_kategori"));
			$blog_resimortam=ass(p("blog_resimortam"));
			$blog_aciklama=ass($_POST["blog_aciklama"]);
			$blog_dil=ass(p("blog_dil"));
			$blog_gid=ass(p("blog_gid"));
			
			$ekler = ekalangonder($ilkkisim,$_POST);
			
			if($blog_permalink==""){
				$blog_permalink = permalink($blog_adi)."-".rand(1000,9999);
			}else{
				$blog_permalink = permalink($blog_permalink);
			}
			
			$eski=row(query("SELECT * FROM ".prefix."_blog WHERE blog_id='$blog_id'"));
			$kont=rows(query("SELECT * FROM ".prefix."_permalink WHERE permalink_link='$blog_permalink' and permalink_dil='$blog_dil'"));
			
			if($blog_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}elseif($kont>0 and $eski["blog_permalink"]!=$blog_permalink){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Bu permalinkte bir içerik var.';
				$json['uyari'] = '<div class="alert alert-warning">Bu permalinkte bir içerik var.</div>';
			}else{
				
				if($_FILES["blog_resim"]["tmp_name"]!=""){
					$kaynak		 = $_FILES["blog_resim"]["tmp_name"];
					$resim 		 = $_FILES["blog_resim"]["name"];
					$rtipi		 = $_FILES["blog_resim"]["type"];
					$rboyut		 = $_FILES["blog_resim"]["size"];
					$hedef 		 = "../../app/Images";
					$blog_resim=resimyukle($kaynak,$resim,$rtipi,$rboyut,$hedef);			
				}elseif(p("blog_resimortam")!=""){
					$blog_resim = $blog_resimortam;	
				}
				
				$query="UPDATE ".prefix."_blog SET 
				".implode("",$ekler)."
				blog_adi='$blog_adi',
				blog_permalink='$blog_permalink',
				blog_desc='$blog_desc',
				blog_keyw='$blog_keyw',
				blog_kategori='$blog_kategori',
				blog_resim='$blog_resim',
				blog_aciklama='$blog_aciklama'
				WHERE blog_id='$blog_id'
				";
				$ekle=query($query);
				if($ekle){
					
					$eski_permalink = $eski["blog_permalink"];
					query("UPDATE ".prefix."_permalink SET
					permalink_modulid='".$blog_id."', 
					permalink_link='$blog_permalink'
					WHERE permalink_link='$eski_permalink'");
					
					query("UPDATE ".prefix."_permalink SET
					permalink_adi='".$eski[$ilkkisim."_adi"]."',
					permalink_modulid='".$blog_id."', 
					permalink_git='$blog_permalink'
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
			$oku=row(query("SELECT * FROM ".prefix."_blog WHERE blog_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["blog_durum"]==1){
					query("UPDATE ".prefix."_blog SET blog_durum='0' WHERE blog_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_blog SET blog_durum='1' WHERE blog_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_blog WHERE blog_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_permalink WHERE permalink_link='".$oku["blog_permalink"]."'");
				query("DELETE FROM ".prefix."_blog WHERE blog_gid='$id'");
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