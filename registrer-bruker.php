<?php
/* registrer-bruker */
/* Programmet registrerer en ny bruker i databasen */
?>
<!DOCTYPE html>
<html lang="no-nb">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="oblig1stil.css">
<title>Registrer-bruker</title>
<style>
body{
  background-color: lightyellow;
}
</style>
</head>
<div class="regbrukerform">
<h3> Registrer bruker </h3>

<form method="post" action="" id="registrerBrukerSkjema" name="registrerBrukerSkjema">
  <div class="regbruker">
<label>  Brukernavn </label> <input type="text" id="brukernavn" name="brukernavn" required /><br>
<label>  Passord </label> <input name="passord" type="password" id="passord" required /><br>
</div><br>
  <input type="submit" value="Registrer bruker" id="registrerBrukerKnapp" name="registrerBrukerKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form><br>
<a href="innlogging.php">Tilbake til innlogging</a><br>
</div>
<?php
    if (isset($_POST["registrerBrukerKnapp"])){

        include("sjekkbrukerogpassord.php");
        include("tilkobling-db.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

        $brukernavn=$_POST["brukernavn"];
        $passord=$_POST["passord"];

    if (!$brukernavn || !$passord){
        echo "Alle felt m&aring; fylles ut";
    }

    else{

    if (brukerFinnes($brukernavn)){ /* brukernavnet er registrert fra før */
        echo"<p style='text-align:center;'>Brukernavnet er registrert fra f&oslash;r</p>";
    }

    else{
        $sqlSetning="INSERT INTO bruker VALUES ('$brukernavn','$passord');";
        mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; registrere data i databasen");
        /*SQL-setning sendt til database-serveren */

        echo "<p style='text-align:center;'>F&oslash;lgende data er n&aring; registrert:</p>";
        echo "<p style='text-align:center;'>Brukernavn: $brukernavn <br> Passord: $passord </p>";
        echo "<p style='text-align:center;'><a href='innlogging.php'>G&aring; til innloggingsside</a></p>";
    }
  }
}
?>
