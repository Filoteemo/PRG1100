<?php /* lager en fil for å søke i databasetabeller */


include("oblig1start.php");

?>

<h3> S&oslash;k </h3>

<form method="post" action="" id="sokeSkjema" name="sokeSkjema">
  S&oslash;kestreng <input type="text" id="sokestreng" name="sokestreng" required /> <br>
                    <input type="submit" value="Fortsett" id="sokeKnapp" name="sokeKnapp" required />
                    <input type="reset" value="Nullstill" id="nullstill" name="nullstill" required />
</form>

<?php if(isset($_POST["sokeKnapp"]))
{
  $sokestreng=$_POST["sokestreng"];

  include("tilkobling-db.php");

  echo"Treff for s&oslash;kestrengen: <strong> $sokestreng </strong> <br> <br>";


  /* Søk i klassetabellen */
  /* Søk i klassetabellen */
  /* Søk i klassetabellen */

  $sqlSetning="SELECT * FROM klasse WHERE klassekode LIKE '%$sokestreng%' OR klassenavn
  LIKE '%$sokestreng%' OR studiumkode LIKE '%$sokestreng%';";
  $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
  $antallRader=mysqli_num_rows($sqlResultat);

    if($antallRader==0)
    {
      echo "Treff i klasse-tabellen: <br> Ingen <br><br>";
    }
    else
      {
        echo"Treff i klasse-tabellen: <br>";
        echo"<table border=1 align=center>";
        echo"<tr><th align=center> klassekode - klassenavn - studiumkode </th> </tr>";

        for ($r=1;$r<=$antallRader;$r++)
        {
          $rad=mysqli_fetch_array($sqlResultat);
          $klassekode=$rad["klassekode"];
          $klassenavn=$rad["klassenavn"];
          $studiumkode=$rad["studiumkode"];

          $sokestrenglengde=strlen($sokestreng); /* lengden på søkestrengen */

          echo"<tr><td>";
          $tekst="$klassekode-$klassenavn-$studiumkode"; /* første tekststreng */
          $startpos=stripos($tekst,$sokestreng);/* første startpos */

          while ($startpos!==false)
          {
            $tekstlengde=strlen($tekst); /* lengden op teksten */

            $hode=substr($tekst,0,$startpos);
            $sok=substr($tekst,$startpos,$sokestrenglengde);
            $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

            echo"$hode<strong><font color='green'>$sok</font></strong>"; /* deler av utskriften */

            $tekst=$hale; /* ny tekst er lik nåværende hale */
            $startpos=stripos($tekst,$sokestreng);
          }
          echo"$hale</td></tr>";
        }
        echo"</table> <br>";
      }
      /* Søk i klassetabellen */
      /* Søk i klassetabellen */
      /* Søk i klassetabellen */

      /* Søk i bildetabellen */
      /* Søk i bildetabellen */
      /* Søk i bildetabellen */


        $sqlSetning="SELECT * FROM bilde WHERE bildenr LIKE '%$sokestreng%' OR opplastningsdato
        LIKE '%$sokestreng%' OR beskrivelse LIKE '%$sokestreng%' OR filnavn LIKE '%$sokestreng%';";
        $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
        $antallRader=mysqli_num_rows($sqlResultat);

          if($antallRader==0)
          {
            echo "Treff i bilde-tabellen: <br> Ingen <br><br>";
          }
          else
            {
              echo"Treff i bilde-tabellen: <br>";
              echo"<table border=1 align=center>";
              echo"<tr><th align=center> bildenr - opplastningsdato - beskrivelse - filnavn </th> </tr>";

              for ($r=1;$r<=$antallRader;$r++)
              {
                $rad=mysqli_fetch_array($sqlResultat);
                $bildenr=$rad["bildenr"];
                $opplastningsdato=$rad["opplastningsdato"];
                $beskrivelse=$rad["beskrivelse"];
                $filnavn=$rad["filnavn"];

                $sokestrenglengde=strlen($sokestreng); /* lengden på søkestrengen */

                echo"<tr><td>";
                $tekst="$bildenr - $opplastningsdato - $beskrivelse - $filnavn"; /* første tekststreng */
                $startpos=stripos($tekst,$sokestreng);/* første startpos */

                while ($startpos!==false)
                {
                  $tekstlengde=strlen($tekst); /* lengden op teksten */

                  $hode=substr($tekst,0,$startpos);
                  $sok=substr($tekst,$startpos,$sokestrenglengde);
                  $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                  echo"$hode<strong><font color='green'>$sok</font></strong>"; /* deler av utskriften */

                  $tekst=$hale; /* ny tekst er lik nåværende hale */
                  $startpos=stripos($tekst,$sokestreng);
                }
                echo"$hale</td></tr>";
              }
              echo"</table> <br>";
            }
            /* Søk i bildetabellen */
            /* Søk i bildetabellen */
            /* Søk i bildetabellen */

            /* Søk i student tabellen */
            /* Søk i student tabellen */
            /* Søk i student tabellen */

            $sqlSetning="SELECT * FROM student WHERE brukernavn LIKE '%$sokestreng%' OR fornavn
            LIKE '%$sokestreng%' OR etternavn LIKE '%$sokestreng%' OR klassekode LIKE '%$sokestreng%' OR bildenr LIKE '%$sokestreng%';";
            $sqlResultat=mysqli_query($db, $sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
            $antallRader=mysqli_num_rows($sqlResultat);

              if($antallRader==0)
              {
                echo "Treff i student-tabellen: <br> Ingen <br><br>";
              }
              else
                {
                  echo"Treff i student-tabellen: <br>";
                  echo"<table border=1 align=center>";
                  echo"<tr><th align=center> brukernavn - fornavn - etternavn - klassekode - bildenr </th> </tr>";

                  for ($r=1;$r<=$antallRader;$r++)
                  {
                    $rad=mysqli_fetch_array($sqlResultat);
                    $brukernavn=$rad["brukernavn"];
                    $fornavn=$rad["fornavn"];
                    $etternavn=$rad["etternavn"];
                    $klassekode=$rad["klassekode"];
                    $bildenr=$rad["bildenr"];

                    $sokestrenglengde=strlen($sokestreng); /* lengden på søkestrengen */

                    echo"<tr><td>";
                    $tekst="$brukernavn - $fornavn - $etternavn - $klassekode - $bildenr"; /* første tekststreng */
                    $startpos=stripos($tekst,$sokestreng);/* første startpos */

                    while ($startpos!==false)
                    {
                      $tekstlengde=strlen($tekst); /* lengden op teksten */

                      $hode=substr($tekst,0,$startpos);
                      $sok=substr($tekst,$startpos,$sokestrenglengde);
                      $hale=substr($tekst,$startpos+$sokestrenglengde,$tekstlengde-$startpos-$sokestrenglengde);

                      echo"$hode<strong><font color='green'>$sok</font></strong>"; /* deler av utskriften */

                      $tekst=$hale; /* ny tekst er lik nåværende hale */
                      $startpos=stripos($tekst,$sokestreng);
                    }
                    echo"$hale</td></tr>";
                  }
                  echo"</table> <br>";
                }

}
/* Søk i student tabellen */
/* Søk i student tabellen */
/* Søk i student tabellen */
include("oblig1slutt.php");
 ?>
