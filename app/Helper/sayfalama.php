<?php
function sayfalama($sayfa,$ssayisi){
	$url = explode("&",$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
	$yurl="";
	$no = 1;
	foreach($url as $deger){
		if($no<2){
			$yurl = $deger;
		}else{
			if(!strstr($deger,"s=")){
				$yurl = $yurl."&".$deger;
			}
			
		}
	$no++;	
	}
			
	?>								
		<nav aria-label="Page navigation example">
		  <ul class="pagination pagination mb-0">
				<li class="page-item <?php if($sayfa<2){ ?>disabled<?php } ?>" >
					<a class="page-link" href="http://<?php echo $yurl;?>&s=<?php echo ($sayfa-1);?>"><<</a>
				</li>				
				<?php
					for($i=($sayfa-5);$i<($sayfa+6);$i++){
						if($i>0 and $i<=$ssayisi){
						?>
						<li class="page-item <?php if($sayfa==$i){ ?> active <?php } ?>" >
							<a class="page-link" href="http://<?php echo $yurl;?>&s=<?php echo $i;?>"><?php echo $i;?></a>
						</li>							
						<?php
						}
					}
				?>		
				<li class="page-item <?php if($sayfa>=$ssayisi){ ?>disabled<?php } ?>" >
					<a class="page-link" href="http://<?php echo $yurl;?>&s=<?php echo ($sayfa+1);?>">>></a>
				</li>
		  </ul>
		</nav>
	<?php
}


function psayfalama($ssayisi,$sayfa,$get){
	$getler = unserialize($get);
	$linkolus = "";
	$no=0;
	foreach($getler as $key=>$deger){
		if($key=="url"){
			$linkolus = $linkolus.rtrim($deger,"/");
		}elseif($key!="s"){
			if($no<1){
				$linkolus = $linkolus."/?".$key."=".$deger;
			}else{
				$linkolus = $linkolus."&".$key."=".$deger;
			}
			$no++;
		}
	}
	if($no<1){
		$link = siteurl.$linkolus."/?s=";
	}else{
		$link = siteurl.$linkolus."&s=";
	}
	
	if($ssayisi>1){
	?>
		<nav aria-label="Page navigation">
			<ul class="pagination justify-content-center">
				<li class="page-item <?= $sayfa<2 ? "disabled" : ""?>">
				<a class="page-link" href="<?php echo $link."1"; ?>">Geri</a></li>				
				<?php
				
				for($i=($sayfa-5);$i<($sayfa+5);$i++){
					if($i>0 and $i<=$ssayisi){
					?>
					<li class="page-item <?php if($i==$sayfa){ echo 'active';} ?>"><a class="page-link" href="<?php echo $link."".$i; ?>"><?php echo $i;?></a></li>
					<?php
					}
				}
				?>
				<li class="page-item <?= $ssayisi>$sayfa ? "" : "disabled"?>" ><a class="page-link" href="<?php echo $link."".$ssayisi; ?>">İleri</a></li>
			</ul>
		</nav>	
	<?php
	}
}
function msayfalama($ssayisi,$sayfa,$link){
	if($ssayisi>1){
		?><ul class="sayfalama"><?php
		for($i=($sayfa-5);$i<($sayfa+5);$i++){
			if($i>0 and $i<=$ssayisi){		
				?>
					<li class='r3'><a href="<?php echo $link."/".$i; ?>"><?= $i ?></a></li>		
				<?php
			}
		}
		?></ul><?php
	}
}
?>