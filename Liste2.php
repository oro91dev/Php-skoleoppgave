
<table>
<tr>
 <form method="Post">
                                
<td><input type="submit" name="VislisteU" value="Visliste over utøvere" /></td>      
</form>


 <form method="Post">
                                
<td><input type="submit" name="VislisteP" value="Visliste over publikum" /></td>      
</form>
<tr>
 <form action="index.php" method="Post">
                                
<td><input type="submit" name="Forside" value="Forside" /></td>      
</form>
</tr>
</tr>
<?php
include "Connect-db.php";
if(isset($_REQUEST["VislisteU"]))
{
$sql="Select * from utover";
$resultat = mysql_query($sql);
if(!$resultat)
{
    echo "Feil i henting av data fra databasen";
}
else
{
    $antallRader = mysql_affected_rows();
    echo "ID   Fornavn   Etternavn   Adresse   Postnr   Poststed   Telefonnr   Nationalitet<br/>";
    for($i=0;$i<$antallRader;$i++)
{
        $rad = mysql_fetch_array($resultat);
        echo $rad["PersonID"]."  ".$rad["Fornavn"]."  ".$rad["Etternavn"]."  ";
        echo $rad["Adresse"]."  ".$rad["Postnr"]."  ".$rad["Poststed"]."  ".$rad["Telefonnr"]."  ".$rad["Nationalitet"]."<br/>";
}    
}
}
?>
<?php
include "Connect-db.php";
if(isset($_REQUEST["VislisteP"]))
{
$sql="Select * from publikum";
$resultat = mysql_query($sql);
if(!$resultat)
{
    echo "Feil i henting av data fra databasen";
}
else
{
    $antallRader = mysql_affected_rows();
    echo "ID   Fornavn   Etternavn   Adresse   Postnr   Poststed   Telefonnr   Billettype<br/>";
    for($i=0;$i<$antallRader;$i++)
{
        $rad = mysql_fetch_array($resultat);
       echo $rad["PublikumID"]."  ".$rad["Fornavn"]."  ".$rad["Etternavn"]."  ";
       echo $rad["Adresse"]."  ".$rad["Postnr"]."  ".$rad["Poststed"]."  ".$rad["Telefonnr"]."  ".$rad["Billettype"]."<br/>";
}    
}
}
?>

