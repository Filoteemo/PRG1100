<?php
session_start();
@$innloggetBruker=$_SESSION["brukernavn"];

if(!$innloggetBruker) /* bruker er ikke innlogget */
{
  echo"<meta http-equiv='refresh' content='0;url=innlogging.php'>";
}
?>
<!DOCTYPE html>
<html lang="no-nb">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="oblig1stil.css">
<title>innlevering2</title>
</head>
<body>
<div class="grid-container">
  <div class="header">
<h1> Obligatorisk oppgave 2 </h1>
  </div>
  <div class="meny">
<p><a href="index.php">Hjem</a></p>
<h2> Registrer klasse </h2>
<p><a href="registrer-klasse.php">Registrer klasse</a></p>
<p><a href="vis-alle-klasser.php">Vis alle klasser</a></p>
<p><a href="endre-klasse.php">Endre klasse</a></p>
<p><a href="slett-klasse.php">Slett klasse</a></p>
<!-- klasse ferdig -->
<h2> Registrer bilde </h2>
<p><a href="registrer-bilde.php">Registrer bilde</a></p>
<p><a href="vis-alle-bilder.php">Vis alle bilder</a></p>
<p><a href="endre-bilde.php">Endre bilde</a></p>
<p><a href="slett-bilde.php">Slett bilde</a></p>
<!-- bilde ferdig -->
<h2> Registrer student </h2>
<p><a href="registrer-student.php">Registrer student</a></p>
<p><a href="vis-alle-studenter.php">Vis alle studenter</a></p>
<p><a href="endre-student.php">Endre student</a></p>
<p><a href="slett-student.php">Slett student</a></p>
<!--student ferdig -->
<h2> Klasseliste med bilder </h2>
<p><a href="vis-klasseliste.php">Vis klasseliste</a></p>
<!--klasseliste ferdig -->
<h2> Søk </h2>
<p><a href="sok.php">Søk i databasen</a></p>
<p><a href="utlogging.php"> Logg ut </a></p>
<!--søk ferdig -->
  </div>
  <div class="left">
