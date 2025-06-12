<?php

if($_POST){
	$ickisim = p("ickisim");
	$ilkkisim = "menu";
	
	logekle($config["yonetici"]["yonetici_ad"].' '.$ilkkisim.' '.$ickisim.' menusında işlem yaptı.');
	
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="ekle"){
		if($config["yetki"]["ekle"]==1){
			$menu_adi=ass(p("menu_adi"));
			$menu_dil=ass(p("menu_dil"));
			$menu_gid=ass(p("menu_gid"));
			
			if($menu_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				$query="INSERT INTO ".prefix."_menu SET 
				menu_adi='$menu_adi',
				menu_ekleyen='".$config["yonetici"]["yonetici_id"]."',
				menu_durum='1',
				menu_kayitzaman='".time()."',
				menu_dil='$menu_dil',
				menu_gid='$menu_gid'
				";
				$ekle=query($query);
				if($ekle){
					
					
					$sonid = row(query("SELECT * FROM ".prefix."_menu WHERE menu_adi='$menu_adi' ORDER BY menu_id DESC LIMIT 0,1"));
					if($menu_gid==""){
						query("UPDATE ".prefix."_menu SET menu_gid='".$sonid["menu_id"]."' WHERE menu_id='".$sonid["menu_id"]."'");
					}else{
						$orj=row(query("SELECT * FROM ".prefix."_menu WHERE menu_id='$menu_gid'"));
					}
					$sonid = row(query("SELECT * FROM ".prefix."_menu WHERE menu_adi='$menu_adi' ORDER BY menu_id DESC LIMIT 0,1"));
					
					$json['tost'] = 'success';
					$json['mesaj'] = 'Kayıt işlemi başarılı.';
					$json['uyari'] = '<div class="alert alert-success">Kayıt işlemi başarılı.</div>';
					$json['git'] = "index.php?do=".$ilkkisim."_duzenle&id=".$sonid["menu_gid"]."&dil=".$menu_dil;
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
			$menu_id=ass(p("menu_id"));
			$menu_adi=ass(p("menu_adi"));
			$menu_json=serialize(json_decode($_POST["menu_json"],true));
			$menu_dil=ass(p("menu_dil"));
			$menu_gid=ass(p("menu_gid"));
			

			
			$eski=row(query("SELECT * FROM ".prefix."_menu WHERE menu_id='$menu_id'"));
			if($_POST["menu_json"]==""){
				$menu_json = $eski["menu_json"];
			}
			if($menu_adi==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				
				$query="UPDATE ".prefix."_menu SET 
				menu_adi='$menu_adi',
				menu_json='$menu_json'
				WHERE menu_id='$menu_id'
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
			$oku=row(query("SELECT * FROM ".prefix."_menu WHERE menu_gid='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				if($oku["menu_durum"]==1){
					query("UPDATE ".prefix."_menu SET menu_durum='0' WHERE menu_gid='$id'");
					$json['tost'] = 'success';
					$json['mesaj'] = 'Durum değiştirildi.';
					$json['degis'] = '#durumbuton'.$id;
					$json['degisicerik'] = '<span class="label label-inline label-warning">Pasif</span>';
				}else{
					query("UPDATE ".prefix."_menu SET menu_durum='1' WHERE menu_gid='$id'");
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
			
			$oku=row(query("SELECT * FROM ".prefix."_menu WHERE menu_id='$id'"));
			if($id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Id Gelmedi';
			}else{
				query("DELETE FROM ".prefix."_menu WHERE menu_id='$id'");
				$json['tost'] = 'success';
				$json['mesaj'] = 'Satır silindi.';
				$json['sil'] = '#satir'.$id;
			}
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Sil----------------------#
	if($ickisim=="menuekle"){
		if($config["yetki"]["duzenle"]==1){
					
			$deger = explode("{:}",p("deger"));
			$menu_id = $deger[0];
			$permalink_id = $deger[1];
			
			$oku=row(query("SELECT * FROM ".prefix."_menu WHERE menu_id='$menu_id'"));
			$menu_json = unserialize($oku["menu_json"]);
			
			$menu_json[] = array("id"=>$permalink_id);
			
			$menu_json = serialize($menu_json);
			
			$query="UPDATE ".prefix."_menu SET 
			menu_json='$menu_json'
			WHERE menu_id='$menu_id'
			";
			$ekle=query($query);
			if($ekle){				

				
				
				ob_start();
				$oku=row(query("SELECT * FROM ".prefix."_menu WHERE menu_id='$menu_id'"));
				$menu_json = unserialize($oku["menu_json"]);
				?><ol class="dd-list"><?php
				menunest($menu_json,$menu_id);
				?></ol>
				<script>

					var updateOutput = function(e)
					{
						var list   = e.length ? e : $(e.target),
							output = list.data('output');
						if (window.JSON) {
							output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
						} else {
							output.val('JSON browser support required for this demo.');
						}
					};

					// activate Nestable for list 1
					$('#nestable').nestable({
						group: 1
					})
					.on('change', updateOutput)
					.on('click', '.delete', function() {
						$(this).closest('li').remove();
						updateOutput($('#nestable').data('output', $('#nestable-output')));
					});


					// output initial serialised data
					updateOutput($('#nestable').data('output', $('#nestable-output')));

					$('#nestable-menu').on('click', function(e)
					{
						var target = $(e.target),
							action = target.data('action');
						if (action === 'expand-all') {
							$('.dd').nestable('expandAll');
						}
						if (action === 'collapse-all') {
							$('.dd').nestable('collapseAll');
						}
					});				
				</script>
				<?php
				
				$output = ob_get_contents();
				ob_end_clean();
				$json["degis"] = "#nestable";
				$json["degisicerik"] = $output;	
				
				$json['tost'] = 'success';
				$json['mesaj'] = 'Kayıt işlemi başarılı.';
			}else{
				$json['tost'] = 'danger';
				$json['mesaj'] = queryalert($query);
			}			
			
		}else{
			$json['tost'] = 'success';
			$json['mesaj'] = 'Bu işlemi yapmak için yetkiniz yok.';
		}
	}
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="menulinkekle"){
		if($config["yetki"]["ekle"]==1){
			$menu_id=ass(p("menu_id"));
			$menulink_adi=ass(p("menulink_adi"));
			$menulink_link=ass(p("menulink_link"));
			$menulink_resimortam=ass(p("menulink_resimortam"));
			$menulink_yenisekme=ass(p("menulink_yenisekme"));
			
			if($menulink_adi=="" or $menulink_link==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				$query="INSERT INTO ".prefix."_menulink SET 
				menulink_adi='$menulink_adi',
				menulink_link='$menulink_link',
				menulink_resim='$menulink_resimortam',
				menulink_yenisekme='$menulink_yenisekme'
				";
				$ekle=query($query);
				if($ekle){
					
							
					ob_start();
					
					
					$bak=query("SELECT * FROM ".prefix."_menulink ");
					while($yaz=row($bak)){
						?>
						<div class="row">
							<div class="col-md-8">
								<a href="javascript:;" class="btn btn-sm btn-block btn-info mb-2"><?=$yaz["menulink_adi"]?> - <?=$yaz["menulink_link"]?></a>
							</div>
							<div class="col-md-4">
								<a href="javascript:;" 
								onclick="
									$('#varyasyon').find('[name=ickisim]').val('menulinkduzenle');
									$('#varyasyon').find('[name=menulink_id]').val('<?=$yaz["menulink_id"]?>');
									$('#varyasyon').find('[name=menulink_adi]').val('<?=$yaz["menulink_adi"]?>');
									$('#varyasyon').find('[name=menulink_link]').val('<?=ss($yaz["menulink_link"])?>');
									$('#varyasyon').find('[name=menulink_resimortam]').val('<?=ss($yaz["menulink_resim"])?>');
									$('#varyasyon .resimupload img').attr('src','<?=rg($yaz["menulink_resim"])?>');
									<?php if(ss($yaz["menulink_yenisekme"])==1){ ?>
									$('#varyasyon').find('[name=menulink_yenisekme]').attr('checked','checked');
									<?php }else{ ?>
									$('#varyasyon').find('[name=menulink_yenisekme]').removeAttr('checked');
									<?php } ?>
									
								
								"
								data-toggle="modal" data-target="#varyasyon" 
								class="btn btn-sm btn-primary mb-2"><i class="las la-edit"></i></a>
								<a href="javascript:;" data-islem="menu" data-deger="<?=$voku["menu_id"]?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menulinksil"  
								class="btn btn-sm btn-danger mb-2"><i class="las la-trash"></i></a>
								<a href="javascript:;" data-islem="menu" data-deger="<?=$menu_id?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menuekle"  
								class="btn btn-sm btn-success mb-2">>></a>
							</div>
						</div>
						<?php
					}
					
					$output = ob_get_contents();
					ob_end_clean();
					$json["degis"] = "#menulinklist";
					$json["degisicerik"] = $output;	
					
					$json['tikla'] = '[data-dismiss=modal]';
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
	##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="menulinkduzenle"){
		if($config["yetki"]["duzenle"]==1){
			$menu_id=ass(p("menu_id"));
			$menulink_id=ass(p("menulink_id"));
			$menulink_adi=ass(p("menulink_adi"));
			$menulink_link=ass(p("menulink_link"));
			$menulink_resimortam=ass(p("menulink_resimortam"));
			$menulink_yenisekme=ass(p("menulink_yenisekme"));
			
			if($menulink_adi=="" or $menulink_link==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				$query="UPDATE ".prefix."_menulink SET 
				menulink_adi='$menulink_adi',
				menulink_link='$menulink_link',
				menulink_resim='$menulink_resimortam',
				menulink_yenisekme='$menulink_yenisekme'
				WHERE menulink_id='$menulink_id'";
				$ekle=query($query);
				if($ekle){
					
							
					ob_start();
					
					
					$bak=query("SELECT * FROM ".prefix."_menulink ");
					while($yaz=row($bak)){
						?>
						<div class="row">
							<div class="col-md-8">
								<a href="javascript:;" class="btn btn-sm btn-block btn-info mb-2"><?=$yaz["menulink_adi"]?> - <?=$yaz["menulink_link"]?></a>
							</div>
							<div class="col-md-4">
								<a href="javascript:;" 
								onclick="
									$('#varyasyon').find('[name=ickisim]').val('menulinkduzenle');
									$('#varyasyon').find('[name=menulink_id]').val('<?=$yaz["menulink_id"]?>');
									$('#varyasyon').find('[name=menulink_adi]').val('<?=$yaz["menulink_adi"]?>');
									$('#varyasyon').find('[name=menulink_link]').val('<?=ss($yaz["menulink_link"])?>');
									$('#varyasyon').find('[name=menulink_resimortam]').val('<?=ss($yaz["menulink_resim"])?>');
									$('#varyasyon .resimupload img').attr('src','<?=rg($yaz["menulink_resim"])?>');
									<?php if(ss($yaz["menulink_yenisekme"])==1){ ?>
									$('#varyasyon').find('[name=menulink_yenisekme]').attr('checked','checked');
									<?php }else{ ?>
									$('#varyasyon').find('[name=menulink_yenisekme]').removeAttr('checked');
									<?php } ?>
									
								
								"
								data-toggle="modal" data-target="#varyasyon" 
								class="btn btn-sm btn-primary mb-2"><i class="las la-edit"></i></a>
								<a href="javascript:;" data-islem="menu" data-deger="<?=$voku["menu_id"]?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menulinksil"  
								class="btn btn-sm btn-danger mb-2"><i class="las la-trash"></i></a>
								<a href="javascript:;" data-islem="menu" data-deger="<?=$menu_id?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menuekle"  
								class="btn btn-sm btn-success mb-2">>></a>
							</div>
						</div>
						<?php
					}
					
					$output = ob_get_contents();
					ob_end_clean();
					$json["degis"] = "#menulinklist";
					$json["degisicerik"] = $output;	
					
					$json['tikla'] = '[data-dismiss=modal]';
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
##-------------------------Rütbe Ekle----------------------#
	if($ickisim=="menulinksil"){
		if($config["yetki"]["duzenle"]==1){
			
			$deger = explode("{:}",p("deger"));
			$menu_id = $deger[0];
			$menulink_id = $deger[1];
			
			if($menulink_id==""){
				$json['tost'] = 'warning';
				$json['mesaj'] = 'Lütfen zorunlu alanları boş bırakmayın';
				$json['uyari'] = '<div class="alert alert-warning">Lütfen zorunlu alanları boş bırakmayın</div>';
			}else{
				$query="DELETE FROM ".prefix."_menulink WHERE menulink_id='$menulink_id'";
				$sil=query($query);
				if($sil){
					
							
					ob_start();
					
					
					$bak=query("SELECT * FROM ".prefix."_menulink ");
					while($yaz=row($bak)){
						?>
						<div class="row">
							<div class="col-md-8">
								<a href="javascript:;" class="btn btn-sm btn-block btn-info mb-2"><?=$yaz["menulink_adi"]?> - <?=$yaz["menulink_link"]?></a>
							</div>
							<div class="col-md-4">
								<a href="javascript:;" 
								onclick="
									$('#varyasyon').find('[name=ickisim]').val('menulinkduzenle');
									$('#varyasyon').find('[name=menulink_id]').val('<?=$yaz["menulink_id"]?>');
									$('#varyasyon').find('[name=menulink_adi]').val('<?=$yaz["menulink_adi"]?>');
									$('#varyasyon').find('[name=menulink_link]').val('<?=ss($yaz["menulink_link"])?>');
									$('#varyasyon').find('[name=menulink_resimortam]').val('<?=ss($yaz["menulink_resim"])?>');
									$('#varyasyon .resimupload img').attr('src','<?=rg($yaz["menulink_resim"])?>');
									<?php if(ss($yaz["menulink_yenisekme"])==1){ ?>
									$('#varyasyon').find('[name=menulink_yenisekme]').attr('checked','checked');
									<?php }else{ ?>
									$('#varyasyon').find('[name=menulink_yenisekme]').removeAttr('checked');
									<?php } ?>
									
								
								"
								data-toggle="modal" data-target="#varyasyon" 
								class="btn btn-sm btn-primary mb-2"><i class="las la-edit"></i></a>
								<a href="javascript:;" data-islem="menu" data-deger="<?=$voku["menu_id"]?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menulinksil"  
								class="btn btn-sm btn-danger mb-2"><i class="las la-trash"></i></a>
								<a href="javascript:;" data-islem="menu" data-deger="<?=$menu_id?>{:}<?=$yaz["menulink_id"]?>" data-ickisim="menuekle"  
								class="btn btn-sm btn-success mb-2">>></a>
							</div>
						</div>
						<?php
					}
					
					$output = ob_get_contents();
					ob_end_clean();
					$json["degis"] = "#menulinklist";
					$json["degisicerik"] = $output;	
					
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
		
}

echo json_encode($json);