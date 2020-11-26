<?php /* vis-alle-studenter */
/*
/* Programmet skriver ut alle registrerte studenter
/*
*/
include("oblig1start.php");

include("tilkobling-db.php"); /*tilkobling og valg av database foretatt */

$sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
/* SQL setning sendt til databaseserveren */

$antallRader=mysqli_num_rows($sqlResultat); /*antall rader i resultatet beregnet */

echo"<h3>Registrerte studenter </h3>";
echo "<table border=1 align=center>"; /*align=center sentrerer tabellen skrevet ut ifra databasen */
echo "<tr><th align=left>brukernavn </th> <th align=left>fornavn</th><th align=left>etternavn</th>
<th align=left>klassekode</th><th align=left>bildenr</th></tr>";

for ($r=1;$r<=$antallRader;$r++)
{
  $rad=mysqli_fetch_array($sqlResultat); /*ny rad hentet fra spørringsresultatet */
  $brukernavn=$rad["brukernavn"];
  $fornavn=$rad["fornavn"];
  $etternavn=$rad["etternavn"];
  $klassekode=$rad["klassekode"];
  $bildenr=$rad["bildenr"];
  echo"<tr> <td> $brukernavn </td> <td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td><td>$bildenr </td></tr>";
}
echo"</table>";

include("oblig1slutt.php");
?>
