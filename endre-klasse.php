<?php /* endre-klasse */
/*
/* Programmet lager ett skjema for å endre klasse
/* Programmet endrer den valgte klassen
*/
include("oblig1start.php");

?>
<script src="ajax-finn-klasse.js"> </script>


<h3> Endre klasse </h3>
<form method="post" action="" id="endreKlasseSkjema" name="endreKlasseSkjema">
  <div class="inputklasse">
<label>  Klassekode </label>
<select name="klassekode" id="klassekode" onChange="finn(this.value)">
  <?php print("<option value=''> velg klasse </option>");
  include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
</select><br>
  <label> Klassenavn (ny) </label> <input type="text" id="klassenavn" name="klassenavn" required /><br>
  <label> Studiumkode (ny) </label> <input type="text" id="studiumkode" name="studiumkode" required /><br>
</div>
  <input type="submit" value="Endre studium" id="endreKlasseKnapp" name="endreKlasseKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form>

<?php
if (isset($_POST["endreKlasseKnapp"]))
{
  $klassekode=$_POST["klassekode"];
  $klassenavn=$_POST["klassenavn"];
  $studiumkode=$_POST["studiumkode"];

  if (!$klassekode || !$klassenavn || !$studiumkode)
  {
    echo"Alle felt m&aring; fylles ut";
  }
  else
  {
    include("tilkobling-db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

    $sqlSetning="UPDATE klasse SET klassenavn='$klassenavn', studiumkode='$studiumkode' WHERE klassekode='$klassekode';";
    mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; endre data i databasen");
    /* SQL-setning blir sendt til databaseserveren */
    echo"Klassen med klassekode $klassekode er n&aring; endret <br>";
  }
}

include("oblig1slutt.php");

 ?>
