		
		<section id="bread">
			<div class="container">
				<h1 class="baslik"><?=ss($urunOku["urun_adi"])?></h1>
				<div class="linkler">
					<a href="<?=url?>"><?=pd("Anasayfa")?></a> |
					<a href="<?=url.$urlget[0]."/".$urlget[1]?>" class="active"><?=ss($urunOku["urun_adi"])?></a>
				</div>
			</div>
		</section>			
		
		<section id="urunbar">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
					
					</div>
					<div class="col-md-2 col-6">
					</div>
					<div class="col-md-2 col-6">
						<div class="fiyat">
							<?=ss($urunOku["urun_fiyat"])?> ₺
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
		function saniye($par){
			$bol = explode(":",$par);
			$zaman1 = $bol[0]*60*60;
			$zaman2 = $bol[1]*60;
			return $zaman1 + $zaman2;
		}
		?>
		<section id="urunpage">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<?php if($urunOku["urun_takvimtur"]==0){ ?>
						<div class="card">
							<div class="card-header text-center">
								Aşağıda seçeceğiniz tarih ilk randevu tarihiniz olacak. <br>Diğer randevu tarihleriniz aşağıdaki tarihten 7 gün sonra olacaktır.
							</div>
							<div class="card-body">
								<?php 
								$suankiseans = $urlget[2]=="" ? 1 : $urlget[2];
								$haftabas = strtotime("next monday") + (60*60*24*7*($suankiseans-1));
								$haftason = $haftabas+(60*60*24*7);
								$seans = ss($urunOku["urun_seans"]);
								$seanssure = ss($urunOku["urun_seanssure"]);
								$aralik = unserialize($urunOku["urun_aralik"]);
								foreach($aralik["gun"] as $key=>$gun){
									$basla = saniye($aralik["basla"][$key]);
									$bitir = saniye($aralik["bitir"][$key]);
									if($gun!=""){
										$tarihler[$gun][] = array(
											"0"=> $basla,
											"1"=> $bitir,
										);
									}
									
								}
								?>
								<div class="alert alert-info text-center"><?=pd("Seçilen Seans")?> : <?=$suankiseans?></div>
								<div class="row">
									<?php 
									foreach($tarihler as $gunid=>$tarih){
									$ggid=$gunid;
									if($ggid==0){ $ggid = 7; }
									$gunzaman = $haftabas + (60*60*24*($ggid-1));
									?>
									<div class="col">
										<div class="takvimbas"><?=$gunler[$ggid]?></div>
										<?php foreach($tarih as $zaman){ ?>
											<?php 
											$zamanbasla = $gunzaman + $zaman[0];
											$zamanbitir = $gunzaman + $zaman[1];
											for($g=$zamanbasla;$g<$zamanbitir;$g+=(60*$seanssure)){ ?>
											<a href="javascript:;" 
											data-islem="sepetekle" data-deger="<?=$urunOku["urun_id"]?>{:}<?=$g?>{:}<?=$suankiseans?>"
											class="takvimlink"><?=date("d.m.Y H:i",$g)?></a>
											<?php } ?>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php }elseif($urunOku["urun_takvimtur"]==1){ ?>
						<div class="card">
							<div class="card-header text-center">
								Aşağıda seçeceğiniz tarih ilk randevu tarihiniz olacak. <br>Diğer randevu tarihleriniz aşağıdaki tarihten 7 gün sonra olacaktır.
							</div>
							<div class="card-body">
								<div class="row">
									<?php
									
									$bugun = strtotime(date('d.m.Y'));
									$sonrakibiray = $bugun+(60*60*24*28);
									?>
									
									<?php 
									for($i=$bugun;$i<($bugun+(60*60*24*7));$i+=(60*60*24)){
									$ggid=date("w",$i);
									if($ggid==0){ $ggid = 7; }
									$songun = $bugun+(60*60*24*7*4);
									?>
									<div class="col">
										<div class="takvimbas"><?=$gunler[$ggid]?></div>
										<?php for($g=$i;$g<$songun;$g+=(60*60*24*7)){ ?>
										<a href="javascript:;" 
										data-islem="sepetekle" data-deger="<?=$urunOku["urun_id"]?>{:}<?=$g?>"
										class="takvimlink"><?=date("d.m.Y",$g)?></a>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
						<?php }else{ ?>
						<div class="card">
							<div class="card-header text-center">
								<?=ss($urunOku["urun_adi"])?> paketini aşağıdaki buton ile sepete ekleyin. <br>Ürün  ödemesini yaptıktan sonra dekontunuzu <br>adınız ve soyadınızla birlikte <?=info("telefon1")?>'ya göndermeniz gerekmektedir.
							</div>
							<div class="card-body">
								<?php if($urunOku["urun_aciklama"]!=""){ ?>
								<div class="text-dark text-center p-5"><?=$urunOku["urun_aciklama"]?></div>
								<?php } ?>
								<div class="text-center">
									<a href="javascript:;" class="btn btn-success" data-islem="sepetekle" data-deger="<?=$urunOku["urun_id"]?>{:}0">
										Sepete Ekle
									</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="col-md-3">
						<div class="sagblog mt-4">
							<?php foreach($urunDizi as $deger){ ?>
							<a href="<?=url.$deger["urun_permalink"]?>" class="blogk">
								<img src="<?=rg($deger["urun_resim"])?>" class="resim">
								<div class="adi">
									<?=ss($deger["urun_adi"])?>
								</div>
							</a>
							<?php } ?>
						</div>
						<a href="<?=url.ld("urunler")?>" class="link"><?=pd("Tüm Ürünler")?> <i class="las la-long-arrow-alt-right ms-2"></i></a>
					</div>
				</div>
			</div>
		</section>