<?php /* endre-bilde */
/*
/* Programmet lager ett skjema for å endre bilde
/* Programmet endrer det valgte bilde
*/
include("oblig1start.php");

?>
<script src="ajax-finn-bilde.js"></script>

<h3> Endre bilde </h3>
<form method="post" action="" id="finnBildeSkjema" name="finnBildeSkjema">
  <div class="inputbilde">
<label>Bildenr</label>
<select name="bildenr" id="bildenr" onChange="finn(this.value)">
  <?php print("<option value=''>velg bilde</option>");
  include("dynamiske-funksjoner.php"); listeboksBildekode(); ?>
</select> <br>
</div>
  <input type="submit" value="Finn bilde" id="finnBildeKnapp" name="finnBildeKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form><br>

<?php
if (isset($_POST["finnBildeKnapp"]))
{
  $bildenr=$_POST["bildenr"];

  include("tilkobling-db.php");

  $sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
  $sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; hente fra databasen");

  $rad=mysqli_fetch_array($sqlResultat);
  $bildenr=$rad["bildenr"];
  $opplastningsdato=$rad["opplastningsdato"];
  $beskrivelse=$rad["beskrivelse"];
  $filnavn=$rad["filnavn"];


  echo"<form method='post' action='' id='endreBildeSkjema' name'endreBildeSkjema'>";
  echo"<label class='bildenummer'> Bildenr <label> <input type='text' value='$bildenr' name='bildeNr' id='bildeNr' readonly/> <br>"; /* kun leselig */
  echo"<label class='filNavn'> Filnavn </label><input type='text' value='$filnavn' name='filNavn' id='filNavn' readonly/> <br>"; /* kun leselig */
  echo"<label class='nyttbilde'> Opplastningsdato </label><input type='text' value='$opplastningsdato' name='opplastningsdato' id='opplastningsdato' required/> <br>";
  echo"<label class='nyttbilde'>Beskrivelse </label><input type='text' value='$beskrivelse' name='beskrivelse' id='beskrivelse' required/> <br>";
  echo"<label class='nyttbilde'> Nyttfilnavn </label><input type='text' value='$filnavn' name='NyttFilnavn' id='NyttFilnavn' required/> <br>";
  echo"<input type='submit' value='Endre bilde' name='endreBildeKnapp' id='endreBildeKnapp'/>";
  echo"</form>"; /* resultatet fra utfyllingen av finn bilde */
}
if (isset($_POST["endreBildeKnapp"]))
{
  $bildenr=$_POST["bildeNr"];
  $opplastningsdato=$_POST["opplastningsdato"];
  $beskrivelse=$_POST["beskrivelse"];
  $filnavn=$_POST["filNavn"];
  $nyttFilnavn=$_POST["NyttFilnavn"];


  if (!$bildenr || !$opplastningsdato || !$filnavn || !$beskrivelse)
  {
    echo"Alle felt m&aring; fylles ut";
  }
  else
  {
    include("tilkobling-db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

  $gammeltNavn="bilder/".$filnavn; /* definerer variabel for det gamle navnet $filnavn er readonly i formen over */
  $nyttNavn="bilder/".$nyttFilnavn; /* definerer variabel for nytt navn ved endring */
  rename($gammeltNavn, $nyttNavn) or die ("Ikke mulig &aring; endre navn på bildefilen");

    $sqlSetning="UPDATE bilde SET opplastningsdato='$opplastningsdato', beskrivelse='$beskrivelse', filnavn='$nyttFilnavn' WHERE bildenr='$bildenr';"; /* endrer bilde hvor bildenr tilsvarer valgt bildenr */
    mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; endre data i databasen");
    /* SQL-setning blir sendt til databaseserveren */
    echo"Bilde med bildenr: $bildenr er n&aring; endret <br>";
  }
}

include("oblig1slutt.php");

 ?>
