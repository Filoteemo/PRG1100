<?php /* database tilkobling */
/*
/* Programmet foretar tilkobling til database-server og valg av database
*/

$host="localhost"; /*dette er navn på serveren */
$user="233595"; /* brukernavn for eier av databasen */
$password="EayfruRm"; /*passord for eier av databasen */
$database="233595"; /* navn på databasen */

$db=mysqli_connect($host, $user, $password, $database) or die ("Ikke kontakt med database-server");
/*tilkobling til databaseserveren utført, og valg av database lagt inn,
denne linjen med kode skaper forbindelse med databasen */


?>
