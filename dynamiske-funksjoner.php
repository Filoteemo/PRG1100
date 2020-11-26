<?php /* dynamiske-funksjoner */

function listeboksKlassekode()
{
include("tilkobling-db.php");

$sqlSetning="SELECT * FROM klasse ORDER BY klassekode;";
$sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);

for($r=1;$r<=$antallRader;$r++)
  {
  $rad=mysqli_fetch_array($sqlResultat);
  $klassekode=$rad["klassekode"];
  $klassenavn=$rad["klassenavn"];
  $studiumkode=$rad["studiumkode"];

  echo"<option value='$klassekode'>$klassekode $klassenavn $studiumkode </option>";
  }
}


function listeboksBildekode()
{
  include("tilkobling-db.php");

  $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
  $sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);

for($r=1;$r<=$antallRader;$r++)
{
  $rad=mysqli_fetch_array($sqlResultat);
  $bildenr=$rad["bildenr"];
  $filnavn=$rad["filnavn"];
  echo"<option value='$bildenr'>$bildenr, $filnavn </option>";
  }
}

function listeboksBildenrFil()
{
  include("tilkobling-db.php");

  $sqlSetning="SELECT * FROM bilde ORDER BY bildenr;";
  $sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);

for($r=1;$r<=$antallRader;$r++)
{
  $rad=mysqli_fetch_array($sqlResultat);
  $bildenr=$rad["bildenr"];
  $filnavn=$rad["filnavn"];

  echo"<option value='$bildenr;$filnavn'>$bildenr-$filnavn </option>";
  }
}

function listeboksStudentkode()
{
  include("tilkobling-db.php"); /* skriv denne korrekt!!*/

  $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
  $sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);

for($r=1;$r<=$antallRader;$r++)
{
  $rad=mysqli_fetch_array($sqlResultat);
  $brukernavn=$rad["brukernavn"];
  $fornavn=$rad["fornavn"];
  $etternavn=$rad["etternavn"];
  $klassekode=$rad["klassekode"];
  $bildenr=$rad["bildenr"];
  echo"<option value='$brukernavn'> $brukernavn $fornavn $etternavn $klassekode $bildenr</option>"; /* tegnet mellom parentes i explode må være identisk= $del=explode(";", $.....);*/
  }
}

/*function listeboksKlasseliste()
{
  include("tilkobling-db.php"); /* skriv denne korrekt!!

  $sqlSetning="SELECT * FROM student ORDER BY brukernavn;";
  $sqlResultat=mysqli_query($db, $sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);

for($r=1;$r<=$antallRader;$r++)
{
  $rad=mysqli_fetch_array($sqlResultat);
  $klassekode=$rad["klassekode"];
  echo"<option value='$klassekode'> $klassekode</option>";
  }
}
*/
?>
