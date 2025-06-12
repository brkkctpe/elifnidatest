<?php !defined("ADMIN") ? die("Hacking?") : null; ?>
<?php

$dil_id = g("id");

setcookie("dil", $dil_id, time() + (60*60*24), "/");

go("index.php");

?>