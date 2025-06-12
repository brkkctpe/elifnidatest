<?php

setcookie("dil", $urlget[1], time() + (86400 * 30), "/");
go(siteurl.$urlget[1]."/",0);

?>