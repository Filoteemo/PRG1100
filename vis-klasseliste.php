<?php /* vis-klasseliste */
/*
/* Programmet lager ett skjema for å endre bilde
/* Programmet endrer det valgte bilde
*/
include("oblig1start.php");

?>


<h3> Vis klasseliste </h3>
<form method="post" action="" id="finnBildeSkjema" name="finnBildeSkjema">
  <div class="inputbilde">
<label>Klasseliste</label>
<select name="klassekode" id="klassekode">
  <?php print("<option value=''>velg klasse</option>");
  include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
</select> <br>
</div>
  <input type="submit" value="Vis klasse" id="finnKlasseKnapp" name="finnKlasseKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form><br>
<?php /* vis-alle-studenter */
/*
/* Programmet skriver ut alle registrerte studenter
/*
*/
if (isset($_POST["finnKlasseKnapp"]))
{
  $klassekode=$_POST["klassekode"];

  if (!$klassekode)
  {
    echo"Ingen klasse er valgt";
  }

  else
  {
include("tilkobling-db.php"); /*tilkobling og valg av database foretatt */

$sqlSetning="SELECT student.klassekode,student.fornavn, student.etternavn, bilde.bildenr, bilde.filnavn
FROM student
INNER JOIN bilde ON student.bildenr=bilde.bildenr AND klassekode='$klassekode'
ORDER BY student.klassekode;"; /* Setningen brukes for å inkludere to tabeller i en vis klasseliste. Funksjonen kalles INNER JOIN*/
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");
/* SQL setning sendt til databaseserveren */

$antallRader=mysqli_num_rows($sqlResultat); /*antall rader i resultatet beregnet */

echo"<h3> Klasseliste </h3>";
echo "<table border=1 align=center>"; /*align=center sentrerer tabellen skrevet ut ifra databasen */
echo "<tr><th align=left>fornavn</th><th align=left>etternavn</th>
<th align=left>klassekode</th><th align=left>bilde</th></tr>";

for ($r=1;$r<=$antallRader;$r++)
    {
  $rad=mysqli_fetch_array($sqlResultat); /*ny rad hentet fra spørringsresultatet */
  $fornavn=$rad["fornavn"];
  $etternavn=$rad["etternavn"];
  $klassekode=$rad["klassekode"];
  $bildenr=$rad["bildenr"];
  $filnavn=$rad["filnavn"];
  echo"<tr><td> $fornavn </td> <td> $etternavn </td> <td> $klassekode </td><td><img src='bilder/$filnavn'target='_blank' width='100px' height='100px' class='tabellbilde'></td></tr>";
    }
echo"</table>";
  }
}
include("oblig1slutt.php");
?>
