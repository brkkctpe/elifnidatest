<?php
	$menubilgi = array(
		"icon" => '<i class="la la-shopping-basket"></i>',
		"adi" => 'Siparişler',
		"sql" => 'ekip_sepet',
		"altlink" => array(
			"0" => array("adi"=>"Tüm Siparişler","link"=>"sepet_listele"),
			"1" => array("adi"=>"Onaylı Siparişler","link"=>"sepet_listele&sepet_odemedurum=1"),
			"2" => array("adi"=>"Ödeme Bekleyen","link"=>"sepet_listele&sepet_odemedurum=0")
		)
	)
?>