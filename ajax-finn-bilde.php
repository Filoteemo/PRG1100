<?php /* ajax-finn-bilde.php */

include("tilkobling-db.php");

$bildenr=$_GET["bildenr"];

$sqlSetning="SELECT * FROM bilde WHERE bildenr='$bildenr';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);
if($antallRader!=0) /* fagkoden er registrert*/
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $opplastningsdato=$rad["opplastningsdato"];
    $filnavn=$rad["filnavn"];
    $beskrivelse=$rad["beskrivelse"];
    echo"$opplastningsdato;$filnavn;$beskrivelse";
  }

?>
