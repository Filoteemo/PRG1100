<?php /* slett-student */
/*
/* Programmet lager ett skjema for å slette oppgave
/* Programmet sletter den valgte oppgaven
*/
include("oblig1start.php");
?>
<script src="funksjoner.js"></script>

<h3> Slett student </h3>

<form method="post" id="slettStudentSkjema" name="slettStudentSkjema" onSubmit="return bekreft()">
  <div class="inputs">
 <label> Student </label>
  <select name="brukernavn" id="brukernavn">
  <?php print("<option value=''> velg student </option>");
  include("dynamiske-funksjoner.php"); listeboksStudentkode();?>
</select><br>
</div>
  <input type="submit" value="Slett student" id="slettStudentKnapp" name="slettStudentKnapp"/>
</form>

<?php

  if(isset($_POST["slettStudentKnapp"]))
{

  $brukernavn=$_POST["brukernavn"];

  if(!$brukernavn)
    {
      echo"Det er ikke valgt noen student";
    }

else
     {
  include("tilkobling-db.php");

  $sqlSetning="DELETE FROM student WHERE brukernavn='$brukernavn';";
  mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; slette data fra databasen");
  /* sqlsetning sendt til databaseserver. Or die gir feilmld hvis tabell eller verdi ikke finnes */
  echo"F&oslash;lgende student er n&aring; slettet: $brukernavn <br>";
     }
}
include("oblig1slutt.php");



 ?>
