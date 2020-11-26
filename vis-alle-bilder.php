<?php /* vis-alle-bilder */
/*
/* Programmet skriver ut alle registrerte bilder
/*
*/
include("oblig1start.php");

include("tilkobling-db.php"); /*tilkobling og valg av database foretatt */

$sqlSetning="SELECT * FROM bilde;"; /* henter alt fra tabell med navn bilde */
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
/* SQL setning sendt til databaseserveren */


echo"<h3>Registrerte bilder </h3>";
echo "<table border=1 align=center>"; /*align=center sentrerer tabellen skrevet ut ifra databasen */
echo "<tr><th align=left>bildenr </th> <th align=left>opplastningsdato</th><th align=left>beskrivelse</th><th align=left>filnavn</th></tr>";

$antallRader=mysqli_num_rows($sqlResultat); /*antall rader i resultatet beregnet */


for ($r=1;$r<=$antallRader;$r++)
{
  $rad=mysqli_fetch_array($sqlResultat); /*ny rad hentet fra spørringsresultatet */
  $bildenr=$rad["bildenr"];
  $opplastningsdato=$rad["opplastningsdato"];
  $beskrivelse=$rad["beskrivelse"];
  $filnavn=$rad["filnavn"];

  echo"<tr> <td> $bildenr </td> <td> $opplastningsdato </td> <td> $beskrivelse </td> <td> <a href='bilder/$filnavn'target='_blank'> $filnavn </a</td></tr>";
}
echo"</table>";

include("oblig1slutt.php");
?>
