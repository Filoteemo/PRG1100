/* ajax-finn-klasse
Asynkron kommunikasjon hvor valg i tekstboks autofyller resten av inputs
*/

function finn(klassekode)
{
var foresporsel=new XMLHttpRequest(); /* oppretter request-objekt */

foresporsel.onreadystatechange=function()
  {
    if (foresporsel.readyState==4 && foresporsel.status==200) /* responsen er fullført og vellykket */
    {
      var svar=foresporsel.responseText;
      var del=svar.split(";");
      var klassenavn=del[0];
      var studiumkode=del[1];
      document.getElementById("klassenavn").value=klassenavn;
      document.getElementById("studiumkode").value=studiumkode.trim(); /* responsteksten legges i feltet studiumnavn */
    }
  }
  foresporsel.open("GET","ajax-finn-klasse.php?klassekode="+klassekode); /* 1004 sjekker responsen */
  foresporsel.send(); /* sender en request */
}
