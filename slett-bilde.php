<?php /* slett-bilde */
/*
/* Programmet lager ett skjema for å slette bilde
/* Programmet sletter det valgte bilde
*/
include("oblig1start.php");
?>
<script src="funksjoner.js"> </script> <!-- er du sikker på å slette. Henter fra onSubmit="return bekreft()" funksjon-->

<h3> Slett bilde </h3>

<form method="post" action="" id="slettBildeSkjema" name="slettBildeSkjema" onSubmit="return bekreft()">
  <div class="inputs">
  <label>Bilde</label> <select name="bildenrfil" id="bildenrfil">
  <?php print("<option value=''> velg bilde </option>"); /* kommer med et felt som sier: "velg fag" */
  include("dynamiske-funksjoner.php");listeboksBildenrFil();?>
</select><br>
  <input type="submit" value="slett bilde" id="slettBildeKnapp" name="slettBildeKnapp"/>
</div>
</form>

<?php
if (isset($_POST ["slettBildeKnapp"]))
{
  $bildenrfil=$_POST ["bildenrfil"];

$del=explode(";",$bildenrfil); /* fjerner skilletegn gitt i dynamiske funksjoner */
$bildenr=$del[0];
$filnavn=$del[1];

  if(!$bildenr)
  {
    echo "Det er ikke valgt noe bilde";
  }
  else
  {
  include("tilkobling-db.php"); /*tilkobling til databaseserveren er utført og valg av database foretatt */

  $sqlSetning="DELETE FROM bilde WHERE bildenr='$bildenr';"; /* slett setning til db */
  mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; slette data i databasen"); /*sql-setning til databaseserveren */

  $bildefil="bilder/".$filnavn; /* sletter bilde fra serveren hvor mappen er bilder og filnavnet i mappen svarer til $filnavn hentet fra dynamiske funksjoner gjennom bildenrfilnavn i html form*/
  unlink($bildefil) or die ("Ikke mulig &aring; slette bilde på serveren"); /* slett $bildefil eller gi feilmld */

  echo"F&oslash;lgende bilde er n&aring; slettet: $bildenr $filnavn<br>";
  }
}
include("oblig1slutt.php");


 ?>
