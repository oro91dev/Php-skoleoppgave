<?php
include 'PersonKlasse.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title></title>
    </head>
    <body>
        <h1>Registrering av Utøver</h1>
            <table>
                <form method="POST">
                <tr>
                    <td>Fornavn</td><td><input type="text" name="Fornavn" /></td>
                </tr>
                <tr>
                    <td>Etternavn</td><td><input type="text" name="Etternavn" /></td>
                </tr>
                <tr>
                    <td>Adresse</td><td><input type="text" name="Adresse" /></td>
                </tr>
                <tr>
                    <td>Postnr</td><td><input type="text" name="Postnr" /></td>
                </tr>
                <tr>
                    <td>Poststed</td><td><input type="text" name="Poststed" /></td>
                </tr>
                <tr>
                    <td>Telefonnr</td><td><input type="text" name="Telefonnr" /></td>
                </tr>
                <tr>
                    <td>Nationalitet</td><td><input type="text" name="Nationalitet" /></td>
                </tr>
                <tr>
                <td><input type="submit" name="Registrer1" value="Registrer" /></td>      
                </form>
                
                </form>
                    <form action="index.php" method="POST">
                    <td><input type="submit" name="Avbryt" value="Avbryt" /></td>
                </form>
                
                <form action="index.php" method="POST">
                    <td><input type="submit" name="full" value="Fullfør" /></td>
                 </form>
                </tr>
            </table>
    </body>
</html>

<?php

function valider_person($utover)
{
    $feilstring = null; 
    
    if(!$utover->valider_fornavn($utover->getFornavn()))
    {
        $utover->setFornavn(""); 
        $feilstring .="Fornavnet må være mellom 2 og 20 tegn"; 
    }
    if(!$utover->valider_etternavn($utover->getEtternavn()))
    {
        $utover->setEtternavn(""); 
        $feilstring .= "Etternavnet må være mellom 2 og 30 tegn";
    }
    if(!$utover->valider_adresse($utover->getAdresse()))
    {
        $utover->setAdresse(""); 
        $feilstring .= "Adressen må være mellom 2 og 50 tegn"; 
    }
    if(!$utover->valider_postnr($utover->getPostnr()))
    {
        $utover->setPostnr(""); 
        $feilstring .= "Postnummeret må være 4 tall"; 
    }
    if(!$utover->valider_poststed($utover->getPoststed()))
    {
        $utover->setPoststed("");
        $feilstring .="Poststed må være mellom 2 og 30 tegn"; 
    }
    if(!$utover->valider_telefonnr($utover->getTelefonnr()))
    {
        $utover->setTelefonnr("");
        $feilstring .="Telefonnummeret må inneholde 8 tegn"; 
    }
    if(!$utover->valider_nationalitet($utover->getNationalitet()))
    {
        $utover->setNationalitet($_REQUEST["Nationalitet"]);
        $feilstring .="Må inneholde fra 2 til 40 tegn. "; 
    }
    return $feilstring; 
}

if(isset($_REQUEST["Registrer1"]))
{
    
    $utover = new Utover($_REQUEST['Fornavn'], $_REQUEST['Etternavn'], $_REQUEST['Adresse'], $_REQUEST['Postnr'], $_REQUEST['Poststed'], $_REQUEST['Telefonnr'], $_REQUEST['Nationalitet']);
    $feilstring = valider_person($utover);
    
    if($feilstring==null)
    {
         
        $feilstring .=$utover->lagre_Utover_db(); 
    }
    else 
     {
        echo "Feil : <br/>";
        echo $feilstring."<br/>";
     }
}

?>
