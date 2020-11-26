<?php /* registrer-bilde */
/*
/* Programmet lager et html-skjema for å registrere bilder
/* Programmet registrerer data (bildenr, opplastningsdato, filnavn og beskrivelse) i databasen
*/
include("oblig1start.php");
?>
<h3> Registrer bilde </h3>
<form method="post" action="" enctype="multipart/form-data" id="registrerBildeSkjema" name="registrerBildeSkjema">
  <div class="inputbilde">
<label> Bildenr </label> <input type="text" id="bildenr" name="bildenr" required /> <br>
<label> Opplastningsdato </label><input type="date" id="opplastningsdato" name="opplastningsdato" required /><br>
<label> Beskrivelse </label> <input type="text" id="beskrivelse" name="beskrivelse" required/> <br>
<label class="fil"> Fil </label> <input type="file" id="filnavn" name="filnavn" size="60" required/> <br> <!-- definerer input med type="file" og size */-->
</div>
  <input type="submit" value="registrer bilde" id="registrerBildeKnapp" name="registrerBildeKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form>

<?php
if(isset($_POST["registrerBildeKnapp"]))
{
  $bildenr=$_POST["bildenr"];
  $opplastningsdato=$_POST["opplastningsdato"];
  $beskrivelse=$_POST["beskrivelse"];

  $filnavn=$_FILES["filnavn"]["name"]; /* filnavn lastet opp */
  $filtype=$_FILES["filnavn"]["type"]; /* filtype lastet opp */
  $filstorrelse=$_FILES["filnavn"]["size"]; /* filstørrelse lastet opp */
  $tmpnavn=$_FILES["filnavn"]["tmp_name"]; /* midlertidig navn opplastet fra filens opprinnelige navn */
  $nyttnavn="bilder/".$filnavn; /* mappe og filnavn skrevet inn på opplastet fil */


if(!$bildenr || !$opplastningsdato || !$beskrivelse || !$filnavn) /* hvis noen av feltene ikke er utfylt i form */
{
  echo "Alle felt m&aring; fylles ut";
}

else if ($filtype != "image/gif" && $filtype != "image/jpeg" && $filtype != "image/png") /* hvis filtypen ikke er av de følgende <-- */
  {
    echo"<font color='red'>ERROR: Det er kun tillat &aring; laste opp bilder (jpg, gif, png)</font>";
  }

  else if ($filstorrelse > 5000000) /* max 5MB, hvis filen er for stor*/
  {
  echo"Bildet er for stort";
  }

else /* hvis ingen av de over utfør dette */
{
  include("tilkobling-db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */
  $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';"; /* spørring til db */
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
  $antallRader=mysqli_num_rows($sqlResultat);

if ($antallRader!=0) /* hvis bildenr er registrert fra før. Baserer seg på $antallRader-->$sqlResultat-->$sqlSetning*/
{
  echo"Bildenr eller bilde er registrert fra f&oslash;r";
}

else /* hvis bildenr ikke er registrert fra før gjør dette*/
    {
  move_uploaded_file($tmpnavn, $nyttnavn) or die ("Ikke mulig &aring; laste opp fil");
      /* bilde lastet opp på serveren eller feilmld*/

  $sqlSetning="INSERT INTO bilde VALUES ('$bildenr','$opplastningsdato','$filnavn','$beskrivelse');";
  if (mysqli_query($db,$sqlSetning))
    {
  /*SQL-setning sendt til database-serveren, spør om registrering av inndata*/

  echo "F&oslash;lgende bilde er n&aring; registrert: <br> Bildenr: $bildenr<br> Opplastningsdato: $opplastningsdato<br> Filnavn:  $filnavn<br> Beskrivelse: $beskrivelse<br>";
    }
    else
      {
  echo"Ikke mulig &aring; registrere i databasen";
  unlink($nyttnavn) or die ("Ikke mulig &aring; slette bilde på serveren igjen"); /* sletter bilde hvis registrering ikke ble vellykket */
      }
    }
  }
}
include("oblig1slutt.php");
?>
