<?php

	function kisalt($par, $uzunluk=50){
		if(strlen($par) > $uzunluk){
			$par= mb_substr($par,0,$uzunluk)."..";
		}
		return $par;
	}