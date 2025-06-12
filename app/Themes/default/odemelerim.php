		
		<div class="card mb-4">
			<div class="card-body">	
				<h1 >Ödemelerim</h1>
				<div class="table-responsive">
					<table class="table">
					  <thead>
						<tr>
						  <th scope="col">Tarih</th>
						  <th scope="col">Fiyat</th>
						  <th scope="col" class="text-right">Randevular</th>
						</tr>
					  </thead>
					  <tbody>
						<?php 
						if(count($sepetDizi)>0){
							foreach($sepetDizi as $deger){ 
							?>
							<tr>
							  <td><?=$deger["sepet_kayitzaman"]?></td>
							  <td><?=$deger["sepet_fiyat"]?></td>
							  <td class="text-right"><a href="<?=url.ld("randevular")."/".$deger["sepet_id"]?>" class="badge badge-success p-3"><?=pd("Randevular")?></a></td>
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
		</div>