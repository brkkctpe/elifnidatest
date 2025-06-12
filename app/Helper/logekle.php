<?php

	function logekle($par){
		
		$log_ip = GetIP();
		$log_zaman = time();
		query("INSERT INTO ".prefix."_log SET
			log_yazi='$par',
			log_ip='$log_ip',
			log_zaman='$log_zaman'
		");
		
	}

?>