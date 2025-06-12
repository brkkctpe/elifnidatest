<?php
session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');
error_reporting(0);
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
//-------Denel Ayarları--------------
define('dbhost','localhost');
define('dbadi','elifnida');
define('dbuser','root');
define('dbpass','root');
define('prefix','ekip');
define("sitedizin","/elifnidatest"); ##Ana dizindeyse sadece / koyun
define("siteurl","http://localhost:8888/elifnidatest/"); ##Sonuna / koyun

$sqliCon = null;


function con(){
	global $sqliCon;

	if($sqliCon == null) {
		$sqliCon = mysqli_connect(dbhost, dbuser, dbpass,dbadi);
	}

	return $sqliCon;
}
function query($query){
	$con = con();
	mysqli_set_charset($con, "utf8");
	return mysqli_query($con, $query);
}

function queryalert($query){
	$con = con();
	mysqli_set_charset($con, "utf8");
	mysqli_query($con, $query);
	return mysqli_error($con);
}
function row($query){
	if($query!=""){
		return mysqli_fetch_assoc($query);
	}
}

function rows($query){
	if($query!=""){
		return mysqli_num_rows($query);
	}	
}
function liste($query){
	$bak=query($query);
	$dizi = array();
	while($yaz=row($bak)){
		$dizi[] = $yaz;
	}
	return $dizi;
}

$sqldurum = con();
if(!$sqldurum){
	echo "SQL Yüklü Değil";
} 

query("UPDATE ".prefix."_ayarlar SET ayarlar_siteurl='".siteurl."'");
