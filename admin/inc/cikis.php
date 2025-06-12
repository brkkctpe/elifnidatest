<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php 

setcookie("yonetici_id", "", time() + (60*60*3), "/");	
go("index.php");
 ?>