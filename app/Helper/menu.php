<?php

function menunest($par,$menu_id){
	if(count($par)>0){
		foreach($par as $deger){
			$peroku=row(query("SELECT * FROM ".prefix."_menulink WHERE menulink_id='".$deger["id"]."'"));
			?>
			<li class="dd-item" data-id="<?=$deger["id"]?>">
				<a href="javascript:;" class="badge badge-danger float-right delete mt-1 mr-1">Sil</a>
				<div class="dd-handle"><?=$peroku["menulink_adi"]?> - <?=$peroku["menulink_link"]?></div>
				<?php if(count($deger["children"])>0){ ?>
				<ol class="dd-list">
					<?=menunest($deger["children"],$menu_id)?>
				</ol>
				<?php } ?>
			</li>
			
			<?php 
		}
	}
}

function menugit($par){
	if(strstr($par,"http") or $par=="#" or $par=="javascript:;"){
		return $par;
	}else{
		return url.$par;
	}
}
## Multi Level Menu System By Gandak ##

function menu($menuler_adi,$json="",$tur=0){
	$vbak=query("SELECT * FROM ".prefix."_menu WHERE menu_adi='$menuler_adi' and menu_dil='".paneldilid."'");
	$vsay=rows($vbak);
	$voku=row($vbak);
	if($json!=""){
		$sonuc = $json;
	}else{
		$sonuc = unserialize($voku["menu_json"]);
	}
	
	
	if(count($sonuc)>0 and $tur==0){
		foreach($sonuc as $deger){
			$peroku=row(query("SELECT * FROM ".prefix."_menulink WHERE menulink_id='".$deger["id"]."'"));
			if(count($deger["children"])>0){
				?>
				<li class="link-li">
					<a class="link-item" href="<?=menugit($peroku["menulink_link"])?>">
						<?=$peroku["menulink_adi"]?> 
					</a>
					<div class="acilan">
						<ul>
							<?=menu($menuler_adi,$deger["children"],1)?>
						</ul>
					</div>
				</li>
				<?php
			}else{
				?>
				<li class="link-li">
					<a class="link-item" href="<?=menugit($peroku["menulink_link"])?>"  <?=$peroku["menulink_yenisekme"]==1 ? 'target="_blank"' : ''?>>
						<?=$peroku["menulink_adi"]?>
					</a>
				</li>
				<?php
			}
		}
	}elseif(count($json)>0 and $tur==1){
		foreach($json as $key=>$deger){
			$peroku=row(query("SELECT * FROM ".prefix."_menulink WHERE menulink_id='".$deger["id"]."'"));
			if(count($json)>0){
				?>
					<li class="link-li">
						<a class="link-item" href="<?=menugit($peroku["menulink_link"])?>" <?=$peroku["menulink_yenisekme"]==1 ? 'target="_blank"' : ''?>>
							<?=$peroku["menulink_adi"]?>
						</a>
					</li>
				<?php
			}
		}
	}elseif($tur==2){
		foreach($sonuc as $key=>$deger){
			$peroku=row(query("SELECT * FROM ".prefix."_menulink WHERE menulink_id='".$deger["id"]."'"));
			if(count($sonuc)>0){
				?>
					<li class="link-li">
						<a class="link-item" href="<?=menugit($peroku["menulink_link"])?>" <?=$peroku["menulink_yenisekme"]==1 ? 'target="_blank"' : ''?>>
							<?=$peroku["menulink_adi"]?>
						</a>
					</li>
				<?php
			}
		}
	}elseif($tur==3){
		foreach($sonuc as $key=>$deger){
			$peroku=row(query("SELECT * FROM ".prefix."_menulink WHERE menulink_id='".$deger["id"]."'"));
			if(count($sonuc)>0){
				?>
					<li class="link-li">
						<a class="link-itemk" href="<?=menugit($peroku["menulink_link"])?>" <?=$peroku["menulink_yenisekme"]==1 ? 'target="_blank"' : ''?>>
							<?=$peroku["menulink_adi"]?>
						</a>
					</li>
				<?php
			}
		}
	}elseif($tur==4){
		foreach($sonuc as $key=>$deger){
			$peroku=row(query("SELECT * FROM ".prefix."_menulink WHERE menulink_id='".$deger["id"]."'"));
			if(count($sonuc)>0){
				?>
					<a href="<?=menugit($peroku["menulink_link"])?>" class="menulink" <?=$peroku["menulink_yenisekme"]==1 ? 'target="_blank"' : ''?> ><?=$peroku["menulink_adi"]?></a>   
				<?php
			
			}
		}
	}
	
} 


?>
