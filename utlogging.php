<?php /*utlogging */

/* Programmet logger ut en bruker fra applikasjonen */

session_start();
session_destroy(); /* sesjonen avsluttes */

echo"<meta http-equiv='refresh'content='0;url=innlogging.php'>";
/* redirigering tilbake til innloggings-siden (innlogging6.php) */
?>
