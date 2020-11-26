<?php /* ajax-finn-student.php */

include("tilkobling-db.php");

$brukernavn=$_GET["brukernavn"];

$sqlSetning="SELECT * FROM student WHERE brukernavn='$brukernavn';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);
if($antallRader!=0) /* student er registrert*/
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $fornavn=$rad["fornavn"];
    $etternavn=$rad["etternavn"];
    $klassekode=$rad["klassekode"];
    $bildenr=$rad["bildenr"];
    echo"$fornavn;$etternavn;$klassekode;$bildenr";
  }

?>
