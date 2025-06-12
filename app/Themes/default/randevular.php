
		<div class="card mb-4">
			<div class="card-body">				
				<h1>Randevularım
					<div class="butonlar">
						Görünüm 
						<a href="#" class="but1 active" 
						onclick="
							$('.but1').removeClass('active');
							$('.but2').addClass('active');
							$('.alan1').toggle();
							$('.alan2').toggle();
						"
						>
							<i class="las la-calendar-day"></i>
						</a>
						<a href="#" class="but2" 
						onclick="
							$('.but2').removeClass('active');
							$('.but1').addClass('active');
							$('.alan1').toggle();
							$('.alan2').toggle();
						">
							<i class="las la-list-ul"></i>
						</a>
					</div>
				</h1>
				<div class="alan1" style="display:none;">
					<div class="table-responsive">
						<table class="table">
						  <thead>
							<tr>
							  <th scope="col">Tarih</th>
							  <th scope="col">Ürün</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
							foreach($randevuDizitakvim as $deger){ 
								$urun_adi = $deger["urun_adi"];
								$randevu_zaman = date("Y-m-d",strtotime($deger["randevu_zaman"]))."T".date("H:i:s",strtotime($deger["randevu_zaman"]));
								$calendar[] = "{
								  title: '".$urun_adi."',
								  start: '".$randevu_zaman."'
								}"; 
							}
							if(count($randevuDizi)>0){
								foreach($randevuDizi as $deger){ 
								$urun_adi = $deger["urun_adi"];
								?>
								<tr>
								  <td><?=$deger["randevu_zaman"]?></td>
								  <td><?=$deger["urun_adi"]?></td>
								</tr>
								<?php
								}
							}else{
							?>
							<div class="alert alert-warning text-center">Listelenecek veri bulunamadı.</div>
							<?php
							}
							
							?>
						  </tbody>
						</table>
					</div>
					<div class="mt-3">
						<?=psayfalama($ssayisi,$sayfa,serialize($_GET))?>
					</div>
				</div>
				<div class="alan2" >
					<div id='calendar'></div>
				</div>
			</div>
		</div>
		