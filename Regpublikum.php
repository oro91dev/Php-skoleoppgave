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
        <h1>Registrering av Publikum</h1>
            <table>
                <form method="Post">
                
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
                    <td>Billettype</td><td><input type="text" name="Billettype" /></td>
                </tr>
                <tr>
                
                <td><input type="submit" name="Registrer2" value="Registrer" /></td>      
                </form>
                    <form action="index.php" method="POST">
                    <td><input type="submit" name="Avbryt" value="Avbryt" /></td>
                </form>
                
                <form action="index.php" method="POST">
                    <td><input type="submit" name="Full" value="Fullfør" /></td>
                 </form>
                </tr>
            </table>
    </body>
</html>
<?php

function valider_person($publikum)
{
    $feilstring = null; 
    
    if(!$publikum->valider_fornavn($publikum->getFornavn()))
    {
        $publikum->setFornavn(""); 
        $feilstring .="Fornavnet må være mellom 2 og 20 tegn"; 
    }
    if(!$publikum->valider_etternavn($publikum->getEtternavn()))
    {
        $publikum->setEtternavn(""); 
        $feilstring .= "Etternavnet må være mellom 2 og 30 tegn";
    }
    if(!$publikum->valider_adresse($publikum->getAdresse()))
    {
        $publikum->setAdresse(""); 
        $feilstring .= "Adressen må være mellom 2 og 50 tegn"; 
    }
    if(!$publikum->valider_postnr($publikum->getPostnr()))
    {
        $publikum->setPostnr(""); 
        $feilstring .= "Postnummeret må være 4 tall"; 
    }
    if(!$publikum->valider_poststed($publikum->getPoststed()))
    {
        $publikum->setPoststed("");
        $feilstring .="Poststed må være mellom 2 og 30 tegn"; 
    }
    if(!$publikum->valider_telefonnr($publikum->getTelefonnr()))
    {
        $publikum->setTelefonnr("");
        $feilstring .="Telefonnummeret må inneholde 8 tegn"; 
    }
    if(!$publikum->valider_Billettype($publikum->getBillettype()))
    {
        $publikum->setBillettype("");
        $feilstring .="Må inneholde fra 2 til 40 tegn. "; 
    }
    return $feilstring; 
}

if(isset($_REQUEST["Registrer2"]))
{
    
    $publikum = new Publikum($_REQUEST['Fornavn'], $_REQUEST['Etternavn'], $_REQUEST['Adresse'], $_REQUEST['Postnr'], $_REQUEST['Poststed'], $_REQUEST['Telefonnr'], $_REQUEST['Billettype']);
    $feilstring = valider_person($publikum);
    
    if($feilstring==null)
    {
         
        $feilstring .=$publikum->lagre_Publikum_db(); 
    }
    else 
     {
        echo "Feil : <br/>";
        echo $feilstring."<br/>";
     }
}