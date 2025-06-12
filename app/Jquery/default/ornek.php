<?php
if($_POST){
	
	if($u_id>0){
		
		$deger = ass(p("deger"));
		ob_start();
		
		?>
		
		<div class="ornek">
			....
		</div>
		<?php
		
		$output = ob_get_contents();
		ob_end_clean();
		$json["degis"] = "#deger";
		$json["degisicerik"] = $output;		
	}else{
		$json["tost"] = "warning";
		$json["mesaj"] = "Lütfen giriş yapınız.";
		$json["uyari"] = '<div class="alert alert-warning">Lütfen giriş yapınız.</div>';
		$json["git"] = url."giris";
	}
}

echo json_encode($json);
?>

