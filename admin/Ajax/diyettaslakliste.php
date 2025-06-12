<?php

if($_POST){
	$deger = explode("{:}",p("deger"));
	$uye = $deger[0];
	$ara = $deger[1];
	
	ob_start();
	?>aa<?php
	$bak=query("SELECT * FROM ".prefix."_diyettaslak WHERE diyettaslak_adi LIKE '%$ara%' ORDER BY diyettaslak_adi ASC LIMIT 0,10"));
	while($yaz=row($bak)){
		?>
			<a href="index.php?mo=uyediyet_ekle&uye=<?=$uye?>&diyettaslak_id=<?=$yaz["diyettaslak_id"]?>" class="d-block mb-2"><?=ss($yaz["diyettaslak_adi"])?></a>
		<?php
	}
	$output = ob_get_contents();
	ob_end_clean();
	$json["degis"] = "#diyettaslakliste";
	$json["degisicerik"] = $output;	
	
	
	
}

echo json_encode($json);