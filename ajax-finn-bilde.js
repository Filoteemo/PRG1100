/* ajax-finn-bilde
Asynkron kommunikasjon hvor valg i tekstboks autofyller resten av inputs
*/

function finn(bildenr)
{
var foresporsel=new XMLHttpRequest(); /* oppretter request-objekt */

foresporsel.onreadystatechange=function()
  {
    if (foresporsel.readyState==4 && foresporsel.status==200) /* responsen er fullført og vellykket */
    {
      var svar=foresporsel.responseText;  /* responsteksten legges i variabelen svar */
      var del=svar.split(";");
      var opplastningsdato=del[0];
      var filnavn=del[1];
      var beskrivelse=del[2];
      document.getElementById("opplastningsdato").value=opplastningsdato;
      document.getElementById("filnavn").value=filnavn.trim();
      document.getElementById("beskrivelse").value=beskrivelse.trim();
    }
  }
  foresporsel.open("GET","ajax-finn-bilde.php?bildenr="+bildenr);
  foresporsel.send(); /* sender en request */
}
