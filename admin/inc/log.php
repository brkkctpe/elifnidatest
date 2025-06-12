<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="listele"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Log Listele</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<form action="index.php" method="get">
			<?php foreach($_GET as $key=>$deger){ if($key!="s" and $key!="arama"){ ?>
			<input type="hidden" name="<?=$key?>" value="<?=$deger?>">
			<?php } } ?>
			<input type="text" class="form-control" name="arama" placeholder="Ara + Enter">
			</form>
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Card-->
		<div class="card card-custom">
			<div class="card-header">
				<div class="card-title">
					<span class="card-icon">
						<i class="flaticon-list-2 text-primary"></i>
					</span>
					<h3 class="card-label">Log Listele</h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Dropdown-->
					<div class="dropdown dropdown-inline mr-2">
						<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="la la-download"></i>Dışa Aktar</button>
						<!--begin::Dropdown Menu-->
						<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
							<ul class="nav flex-column nav-hover">
								<li class="nav-item">
									<a href="javascript:;" onclick="yazdir('#yazdir')" class="nav-link">
										<i class="nav-icon la la-print"></i>
										<span class="nav-text">Yazdır</span>
									</a>
								</li>
							</ul>
						</div>
						<!--end::Dropdown Menu-->
					</div>
					<!--end::Dropdown-->
					<!--begin::Button-->
					<!--end::Button-->
				</div>
			</div>
			<div class="card-body" id="yazdir">
				<?php
				$kurallar = "";
				
				if(g("arama")!=""){
					$kurallar = $kurallar." (log_yazi LIKE '%".g("arama")."%'
					) and";
				}
				
				$kurallar = substr_replace($kurallar, '', -3);
				if($kurallar!=""){$kurallar = "WHERE ".$kurallar;}
				
				$sayfa = g("s") ? g("s") : 1;
				$ksayisi=rows(query("SELECT * FROM ".prefix."_log ".$kurallar));
				$limit=20;
				$ssayisi=ceil($ksayisi/$limit);
				$baslangic=($sayfa*$limit)-$limit;			  
			  
				$bak=query("SELECT * FROM ".prefix."_log 
				".$kurallar." ORDER BY log_id DESC LIMIT $baslangic,$limit");
				$tableDizi = array();
				while($yaz=row($bak)){
					$tableDizi[] = $yaz;
				}
				?>
				<!--begin: Datatable-->
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Log</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($tableDizi as $deger){ ?>
							<tr id="satir<?=$deger["log_id"]?>">
								<th scope="row"><?=$deger["log_id"]?></th>
								<td><?=ss($deger["log_yazi"])?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				<!--end: Datatable-->
			</div>
			<div class="card-footer">
			
				<?=sayfalama($sayfa,$ssayisi)?>
			</div>
		</div>
		<!--end::Card-->
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php } ?>