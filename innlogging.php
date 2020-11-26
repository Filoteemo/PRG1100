<?php /* innlogging */

/* Programmet logger inn en bruker i applikasjonen */

?>
<!DOCTYPE html>
<html lang="no-nb">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="oblig1stil.css">
<title>Innlogging</title>
<style>
body{
  background-color: lightyellow;
}
</style>
</head>
<div class="innlogging">
<h3> Innlogging </h3>

<form method="post" action="" id="innloggingSkjema" name="innloggingSkjema">
  <div class="regbruker">
<label>  Brukernavn </label> <input type="text" id="brukernavn" name="brukernavn" required /><br>
<label>  Passord </label> <input type="password" id="passord" name="passord" required /><br>
</div><br>
  <input type="submit" value="Logg inn" id="logginnKnapp" name="logginnKnapp"/>
  <input type="reset" value="Nullstill" id="nullstill" name="nullstill"/><br>
</form><br>

Ny bruker? <br>
<a href="registrer-bruker.php"> Registrer deg her </a> <br> <br>
</div>
<?php
if(isset($_POST["logginnKnapp"]))
{
  include("sjekk.php"); /* tilkobling til database-serveren utført og valg av database foretatt */

  $brukernavn=$_POST["brukernavn"];
  $passord=$_POST["passord"];

if(!sjekkBrukernavnPassord($brukernavn,$passord)) /* brukernavn og passord er ikke korrekt */
{
  echo "<p style='text-align:center; color:red;'>Feil brukernavn/passord </p><br>";
}

else /* brukernavn og passord er korrekt */
{
  session_start();
  $_SESSION["brukernavn"]=$brukernavn; /* brukernavn lagt inn i session-variabelen */
  echo"<meta http-equiv='refresh' content='0;url=index.php'>";
  /* redigering til hovedsiden (hoved.php) */
  }
}
?>
