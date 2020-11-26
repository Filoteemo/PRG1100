<?php /* registrer-klasse */
/*
/* Programmet lager et html-skjema for å registrere klasse
/* Programmet registrerer data (klassekode, klassenavn og studiumkode) i databasen
*/
include("oblig1start.php");
?>
<h3> Registrer klasse </h3>
<form method="post" action="" id="registrerKlasseSkjema" name="registrerKlasseSkjema">
  <div class="inputs">
  <label>Klassekode </label><input type="text" id="klassekode" name="klassekode" required /><br>
  <label>Klassenavn </label><input type="text" id="klassenavn" name="klassenavn" required /><br>
  <label>Studiumkode </label><input type="text" id="studiumkode" name="studiumkode" required /><br>
</div>
  <input type="submit" value="Fortsett" id="registrerKlasseKnapp" name="registrerKlasseKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form>

<?php
if(isset($_POST["registrerKlasseKnapp"]))
{
  $klassekode=$_POST["klassekode"];
  $klassenavn=$_POST["klassenavn"];
  $studiumkode=$_POST["studiumkode"];

if(!$klassekode || !$klassenavn || !$studiumkode)
{
  echo "Alle felt m&aring; fylles ut";
}
else
{
  include("tilkobling-db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
  $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
  $antallRader=mysqli_num_rows($sqlResultat);

if ($antallRader!=0) /* studiet er registrert fra før */
{
  echo"Klassen er registrert fra f&oslash;r";
}

else
{
  $sqlSetning="INSERT INTO klasse (klassekode,klassenavn, studiumkode)
  VALUES ('$klassekode','$klassenavn','$studiumkode');";
  mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; registrere data i databasen");
  /*SQL-setning sendt til database-serveren */
  echo "F&oslash;lgende klasse er n&aring; registrert: $klassekode, $klassenavn, $studiumkode";
    }
  }
}
include("oblig1slutt.php");
?>
