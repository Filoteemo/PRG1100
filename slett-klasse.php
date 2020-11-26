<?php /* slett-klasse */
/*
/* Programmet lager ett skjema for å slette klasse
/* Programmet sletter det valgte studiet
*/
include("oblig1start.php");

?>
<script src="funksjoner.js"> </script>

<h3> Slett klasse </h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
  <div class="slettklasse">
  Klasse
  <select name="klassekode" id="klassekode">
    <?php print("<option value=''> velg klasse </option>");
     include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?>
  </select> <br>
  <input type="submit" value="slett klasse" id="slettKlasseKnapp" name="slettKlasseKnapp"/>
</div>
</form>

<?php
if (isset($_POST ["slettKlasseKnapp"]))
{
  $klassekode=$_POST["klassekode"];

  if(!$klassekode)
  {
  echo"Ingen klasse er valgt"; 
  }
  else
  {

  include("tilkobling-db.php"); /*tilkobling til databaseserveren er utført og valg av database foretatt */

  $klassekode=$_POST ["klassekode"];

  $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
  mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; slette data i databasen"); /*sql-setning til databaseserveren */

  echo"F&oslash;lgende klasse er n&aring; slettet: $klassekode <br>";
      }
}
include("oblig1slutt.php");


 ?>
