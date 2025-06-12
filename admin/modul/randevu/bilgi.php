<?php
	$menubilgi = array(
		"icon" => '<i class="la la-calendar"></i>',
		"adi" => 'Randevular',
		"sql" => 'ekip_randevu',
		"altlink" => array(
			"0" => array("adi"=>"Tüm Randevular","link"=>"randevu_listele"),
			"1" => array("adi"=>"Bugünki Randevular","link"=>"randevu_listele&randevu_gun=1"),
			"2" => array("adi"=>"Yarınki Randevular","link"=>"randevu_listele&randevu_gun=2"),
			"3" => array("adi"=>"Haftalık Randevular","link"=>"randevu_listele&randevu_gun=3"),
			"4" => array("adi"=>"Aylık Randevular","link"=>"randevu_listele&randevu_gun=4"),
			"5" => array("adi"=>"Yeni Randevu Ekle","link"=>"randevu_ekle")
		)
	);
?>
