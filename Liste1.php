
<table>
<tr>
 <form method="Post">
                                
<td><input type="submit" name="VislisteU" value="Visliste over påmeldte utøvere" /></td>      
</form>


 <form method="Post">
                                
<td><input type="submit" name="VislisteP" value="Visliste over påmeldte publikum" /></td>      
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
$sql="Select * from ovelse_utover";
$resultat = mysql_query($sql);
if(!$resultat)
{
    echo "Feil i henting av data fra databasen";
}
else
{
    $antallRader = mysql_affected_rows();
    echo "ID   Fornavn   Etternavn  Dato  Tid  Type  Nationalitet<br/>";
    for($i=0;$i<$antallRader;$i++)
{
        $rad = mysql_fetch_array($resultat);
        echo $rad["ID"]."  ".$rad["Fornavn"]."  ".$rad["Etternavn"]."  ";
        echo $rad["Dato"]."  ".$rad["Tid"]."  ".$rad["Type"]."  ".$rad["Nationalitet"]."<br/>";
}    
}
}
?>
<?php
include "Connect-db.php";
if(isset($_REQUEST["VislisteP"]))
{
$sql="Select * from ovelse_publikum";
$resultat = mysql_query($sql);
if(!$resultat)
{
    echo "Feil i henting av data fra databasen";
}
else
{
    $antallRader = mysql_affected_rows();
    echo "ID   Fornavn   Etternavn  Dato  Tid  Type  Billettype<br/>";
    for($i=0;$i<$antallRader;$i++)
{
        $rad = mysql_fetch_array($resultat);
        echo $rad["ID"]."  ".$rad["Fornavn"]."  ".$rad["Etternavn"]."  ";
        echo $rad["Dato"]."  ".$rad["Tid"]."  ".$rad["Type"]."  ".$rad["Billettype"]."<br/>";
}    
}
}
?>

