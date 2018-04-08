<?php
include 'OvelseKlasse.php'; 
?>
<form method="POST">
<h1>Registrere øvelser</h1>

    <table border="0">
        <tr>   
       <td>Skriv inn Dato(dd.mm.yyyy)</td><td><input type="text" name="Dato" /></td>
            
       <br/> 
        <td>Skriv inn Tid(hh:mm)</td><td><input type="text" name="Tid" /></td>
        </tr>
        
         <tr>
              <td>Type øvelse</td><td><input type="text" name="Type" /></td>
         </tr>        
    </table> 
    <table>
        <tr>
            <td><input type="submit" name="Registrer" value="Registrer" /></td>
        </form>
        
       <form action="index.php" method="POST">
          <td><input type="submit" name="Avbryt" value="Forside" /></td>
       </form>
        
       <form action="index.php" method="POST">
              <td><input type="submit" name="Avbryt" value="Avbryt" /></td>
       </form>
        </tr>
        
    </table>
    
 <?php

function valider_ovelse($ovelse)
{
    $feilstring = null; 
    
    if(!$ovelse->getDato())
    {
        $ovelse->setDato(""); 
        $feilstring .="Datoen må være med <br/>"; 
    }
    if(!$ovelse->getTid())
    {
        $ovelse->setTid(""); 
        $feilstring .="Tid må være med <br/>"; 
    }
    if(!$ovelse->valider_type($ovelse->getType()))
    {
        $ovelse->setType(""); 
        $feilstring .="Det må være mellom 2 og 25 tegn.  <br/>"; 
    }
    return $feilstring;
}

if(isset($_REQUEST["Registrer"]))
{
    
    $ovelse = new OvelseKlasse($_REQUEST['Dato'], $_REQUEST['Tid'], $_REQUEST['Type']);
    $feilstring = valider_ovelse($ovelse);
    
    if($feilstring==null)
    {
         
        $feilstring .=$ovelse->lagre_Ovelse_db();
    }
    else 
     {
        echo "Feil : <br/>";
        echo $feilstring."<br/>";
     }
}
   
?> 