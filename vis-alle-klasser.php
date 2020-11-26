<?php /* vis-alle-klasser */
/*
/* Programmet skriver ut alle registrerte klasser
/*
*/
include("oblig1start.php");

include("tilkobling-db.php"); /*tilkobling og valg av database foretatt */

$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
/* SQL setning sendt til databaseserveren */

$antallRader=mysqli_num_rows($sqlResultat); /*antall rader i resultatet beregnet */

echo"<h3>Registrerte klasser </h3>";
echo "<table border=1 align=center>"; /*align=center sentrerer tabellen skrevet ut ifra databasen */
echo "<tr><th align=left>klassekode </th> <th align=left>klassenavn</th><th align=left>studiumkode</th></tr>";

for ($r=1;$r<=$antallRader;$r++)
{
  $rad=mysqli_fetch_array($sqlResultat); /*ny rad hentet fra spørringsresultatet */
  $klassekode=$rad["klassekode"];
  $klassenavn=$rad["klassenavn"];
  $studiumkode=$rad["studiumkode"];
  echo"<tr> <td> $klassekode </td> <td> $klassenavn </td> <td> $studiumkode </td> </tr>";
}
echo"</table>";

include("oblig1slutt.php");
?>
