<?php /* endre-student */
/*
/* Programmet lager ett skjema for å endre oppgave
/* Programmet endrer det valgte oppgaven
*/
include("oblig1start.php");

?>
<script src="ajax-finn-student.js"></script>

<h3> Endre student </h3>
<form method="post" action="" id="endreStudentSkjema" name="endreStudentSkjema">
  <div class="regoppgave">
  <label>Brukernavn </label> <select name="brukernavn" id="brukernavn" onChange="finn(this.value)">
    <?php print("<option value=''> velg brukernavn </option>");
    include("dynamiske-funksjoner.php"); listeboksStudentkode();?>
    </select><br>
  <label>Fornavn</label><input type="text" id="fornavn" name="fornavn" required /><br>
  <label>Etternavn</label><input type="text" id="etternavn" name="etternavn" required /><br>
  <label>Klassekode</label><select name="klassekode" id="klassekode">
    <?php print("<option value=''>velg klasse</option>");listeboksKlassekode(); ?>
  </select><br>
  <label>Bildenr</label><select name="bildenr" id="bildenr">
    <?php print("<option value=''>velg bilde</option>");listeboksBildekode(); ?>
  </select><br>
</div>
  <input type="submit" value="Endre student" id="endreStudentKnapp" name="endreStudentKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form>

<?php
if (isset($_POST["endreStudentKnapp"]))
{
  $brukernavn=$_POST["brukernavn"];
  $fornavn=$_POST["fornavn"];
  $etternavn=$_POST["etternavn"];
  $klassekode=$_POST["klassekode"];
  $bildenr=$_POST["bildenr"];

  if (!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$bildenr)
  {
    echo"Alle felt m&aring; fylles ut";
  }
  else
  {
    include("tilkobling-db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

    $sqlSetning="UPDATE student SET fornavn='$fornavn', etternavn='$etternavn', klassekode='$klassekode',
    bildenr='$bildenr' WHERE brukernavn='$brukernavn';";
    mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; endre data i databasen");
    /* SQL-setning blir sendt til databaseserveren */
    echo"Student med brukernavn: $brukernavn er n&aring; endret <br>";
  }
}

include("oblig1slutt.php");

 ?>
