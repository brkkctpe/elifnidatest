<?php

if($_POST){
	$deger = explode("{:}",p("deger"));
	$alanid = $deger[0];
	$resimname = $deger[1];
	ob_start();
	?>
	<div class="col-md-3">
		<?=resimalan($resimname,"Bilgisayardan Resim Seçin","",1)?>
	</div>
	<?php

	
	$output = ob_get_contents();
	ob_end_clean();
	$json["sonaekle"] = $alanid;
	$json["sonaekleicerik"] = $output;	
	
}

echo json_encode($json);