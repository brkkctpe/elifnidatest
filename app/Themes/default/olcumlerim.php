
		<div class="card mb-4">
			<div class="card-body">
				<h1>
					Ölçümlerim
					<div class="sondurum">
						Son Veriler
						<div id="sondurum"><span>%-15 Ortalama</span></div>
					</div>
				</h1>
				<div id="yazdirilacakBolge">
				<div>
				  <canvas id="myChart"></canvas>
				</div>
				<div class="table-responsive">
				<table class="table">
				  <thead>
					<tr>
					  <th scope="col">Tarih</th>
					  <th scope="col">Ağırlık</th>
					  <th scope="col">Bel</th>
					  <th scope="col">Göbek</th>
					  <th scope="col">Kalça</th>
					  <th scope="col">Göğüs</th>
					  <th scope="col"></th>
					</tr>
				  </thead>
				  <tbody>
					<?php 
					function farkdonus($par){
						if($par!="100" and $par!="-100"){
							return $par>0 ? '<span class="badge badge-success ml-2">%'.$par.'</span>' : '<span class="badge badge-danger ml-2">%'.$par.'</span>';
						}
						
					}
					if(count($olcumDizi)>0){
						$yolcumdizi = array();
						$yolcumdizi[0] = "";
						foreach($olcumDizi as $key=>$deger){ 
							$yolcumdizi[] = $deger;
						}
						foreach($yolcumdizi as $key=>$deger){
							if($deger["olcum_tarih"]!=""){
								$agirlikfark = round((($olcumDizi[$key]["olcum_agirlik"] - $deger["olcum_agirlik"]) / $deger["olcum_agirlik"]) * 100,1);
								$belfark = round((($olcumDizi[$key]["olcum_bel"] - $deger["olcum_bel"]) / $deger["olcum_bel"]) * 100,1);
								$gobekfark = round((($olcumDizi[$key]["olcum_gobek"] - $deger["olcum_gobek"]) / $deger["olcum_gobek"]) * 100,1);
								$kalcafark = round((($olcumDizi[$key]["olcum_kalca"] - $deger["olcum_kalca"]) / $deger["olcum_kalca"]) * 100,1);
								$gogusfark = round((($olcumDizi[$key]["olcum_gogus"] - $deger["olcum_gogus"]) / $deger["olcum_gogus"]) * 100,1);
								?>
								<tr>
								  <td><?=$deger["olcum_tarih"]?></td>
								  <td><?=$deger["olcum_agirlik"].farkdonus($agirlikfark)?></td>
								  <td><?=$deger["olcum_bel"].farkdonus($belfark)?></td>
								  <td><?=$deger["olcum_gobek"].farkdonus($gobekfark)?></td>
								  <td><?=$deger["olcum_kalca"].farkdonus($kalcafark)?></td>
								  <td><?=$deger["olcum_gogus"].farkdonus($gogusfark)?></td>
								  <th scope="row">
									<a href="<?=url?>olcum-duzenle/<?=$deger["olcum_id"]?>" class="p-1 text-dark"><i class="la la-pencil"></i></a>
									<a href="<?=url?>olcum-goruntule/<?=$deger["olcum_id"]?>" class="p-1 text-dark"><i class="la la-eye"></i></a>
								  </th>
								</tr>
								<?php
							}
						}
						$sonagirlikfark = round((($olcumDizi[0]["olcum_agirlik"] - $yolcumdizi[$key]["olcum_agirlik"]) / $yolcumdizi[$key]["olcum_agirlik"]) * 100,1) * -1;
						$sonagirlikfark = farkdonus($sonagirlikfark);
						asort($olcumDizi);
						foreach($olcumDizi as $key=>$deger){ 
							$tarihler[] = "'".$deger["olcum_tarih"]."'";
							$agirlik[] = $deger["olcum_agirlik"];
							$bel[] = $deger["olcum_bel"];
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
		</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  
  const labels = [
    <?=implode(",",$tarihler).","?>
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Kilo Ölçümlerim',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?=implode(',',$agirlik)?>],
    },{
      label: 'Bel Ölçümlerim',
      backgroundColor: 'rgb(159 99 255)',
      borderColor: 'rgb(159 99 255)',
      data: [<?=implode(',',$bel)?>,],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
 <script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>