<?php /* registrer-student */
/*
/* Programmet lager et html-skjema for å registrere studenter
/* Programmet registrerer data (brukernavn, fornavn, etternavn, klassekode og bildenr) i databasen
*/
include("oblig1start.php");
?>


<h3> Registrer student </h3>
<form method="post" action="" id="registrerStudentSkjema" name="registrerStudentSkjema">
  <div class="regoppgave">
<label>  Brukernavn </label> <input type="text" id="brukernavn" name="brukernavn" required/><br>
<label>  Fornavn </label><input type="text" id="fornavn" name="fornavn" required /><br>
<label>  Etternavn </label><input type="text" id="etternavn" name="etternavn" required /><br>
<label>  Klassekode </label><select name="klassekode" id="klassekode">
  <?php print("<option value=''>velg klasse</option>");
  include("dynamiske-funksjoner.php"); listeboksKlassekode(); ?> <!-- dynamiske funksjoner kan kun være med en gang!-->
</select> <br>
<label>  Bildenr </label> <select name="bildenr" id="bildenr">
  <?php print("<option value=''>velg bilde</option>");listeboksBildekode(); ?> <!-- ved bruk av include() her og vil submit/reset forsvinne -->
</select> <br>
</div>
  <input type="submit" value="Registrer student" id="registrerStudentKnapp" name="registrerStudentKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form>

<?php
if(isset($_POST["registrerStudentKnapp"]))
{
  $brukernavn=$_POST["brukernavn"];
  $fornavn=$_POST["fornavn"];
  $etternavn=$_POST["etternavn"];
  $klassekode=$_POST["klassekode"];
  $bildenr=$_POST["bildenr"];

if(!$brukernavn || !$fornavn || !$etternavn || !$klassekode || !$bildenr)
{
  echo "Alle felt m&aring; fylles ut";
}
else
{
  include("tilkobling-db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
  $sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
  $antallRader=mysqli_num_rows($sqlResultat);

if ($antallRader!=0) /* oppgaven er registrert fra før */
{
  echo"Student er registrert fra f&oslash;r";
}

else
{
  $sqlSetning="INSERT INTO student(brukernavn,fornavn,etternavn, bildenr, klassekode)
  VALUES ('$brukernavn','$fornavn','$etternavn', '$bildenr', '$klassekode');";
  mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; registrere data i databasen");
  /*SQL-setning sendt til database-serveren */
  echo "F&oslash;lgende student er n&aring; registrert: $brukernavn, $fornavn, $etternavn, $klassekode, $bildenr";
    }
  }
}
include("oblig1slutt.php");
?>
