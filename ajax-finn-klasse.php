<?php /* ajax-finn-klasse.php */

include("tilkobling-db.php");

$klassekode=$_GET["klassekode"];

$sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
$sqlResultat=mysqli_query($db,$sqlSetning) or die ("Ikke mulig &aring; hente data fra databasen");

$antallRader=mysqli_num_rows($sqlResultat);
if($antallRader!=0) /* poststedet er registrert */
  {
    $rad=mysqli_fetch_array($sqlResultat);
    $klassenavn=$rad["klassenavn"];
    $studiumkode=$rad["studiumkode"];
    echo"$klassenavn;$studiumkode";
  }

?>
