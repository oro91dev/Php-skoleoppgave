<?php
include 'Connect-db.php';
include 'Ovelse_utoverklasse.php';
?>
<form  method="Post">
    <table>
<?Php
$sql ="Select * From utover";
$resultat=mysql_query($sql);
if (!$resultat)
{
    echo "not connected<br/>";
}
?>
   <form method="POST">
       <h1>Påmelding for Utøver</h1>
   <td>Finn Fornavn: 
   <select size="1" name="Fornavn">

 <?Php
 while($row=mysql_fetch_assoc($resultat)){
 ?>
   <option value="<?php echo $row['Fornavn']?>">
       <?Php echo $row['Fornavn'];?>
   </option>
<?Php
 }
?>
</select>

<?Php
$sql ="Select * From utover";
$resultat=mysql_query($sql);
if (!$resultat)
{
    echo "not connected<br/>";
}
?>
   <form method="POST">
   <td>Finn Etternavn: 
   <select size="1" name="Etternavn">

 <?Php
 while($row=mysql_fetch_assoc($resultat)){
 ?>
   <option value="<?php echo $row['Etternavn']?>">
       <?Php echo $row['Etternavn'];?>
   </option>
<?Php
 }
?>
</select>
       
<?Php
$sql ="Select * From ovelse";
$resultat=mysql_query($sql);
if (!$resultat)
{
    echo "not connected<br/>";
}
?>
   <form method="POST">
   <td>Finn Dato: 
   <select size="1" name="Dato">

 <?Php
 while($row=mysql_fetch_assoc($resultat)){
 ?>
   <option value="<?php echo $row['Dato']?>">
       <?Php echo $row['Dato'];?>
   </option>
<?Php
 }
?>
</select>
       
<?Php
$sql ="Select * From ovelse";
$resultat=mysql_query($sql);
if (!$resultat)
{
    echo "not connected<br/>";
}
?>
   <form method="POST">
   <td>Finn Tid: 
   <select size="1" name="Tid">

 <?Php
 while($row=mysql_fetch_assoc($resultat)){
 ?>
   <option value="<?php echo $row['Tid']?>">
       <?Php echo $row['Tid'];?>
   </option>
<?Php
 }
?>
</select>

<?Php
$sql ="Select * From ovelse";
$resultat=mysql_query($sql);
if (!$resultat)
{
    echo "not connected<br/>";
}
?>
   <form method="POST">
   <td>Finn Type Øvelse: 
   <select size="1" name="Type">

 <?Php
 while($row=mysql_fetch_assoc($resultat)){
 ?>
   <option value="<?php echo $row['Type']?>">
       <?Php echo $row['Type'];?>
   </option>
<?Php
 }
?>
</select>
       
<?Php
$sql ="Select * From utover";
$resultat=mysql_query($sql);
if (!$resultat)
{
    echo "not connected<br/>";
}
?>
   <form method="POST">
   <td>Finn Nationalitet: 
   <select size="1" name="Nationalitet">

 <?Php
 while($row=mysql_fetch_assoc($resultat)){
 ?>
   <option value="<?php echo $row['Nationalitet']?>">
       <?Php echo $row['Nationalitet'];?>
   </option>
<?Php
 }
?>
</select>

</table>
 <table>
    <td><input type="submit" name="Reg" value="Registrer" /></td>
  </form>
  <form action="index.php" method="Post">
   <td><input type="submit" name="Forside" value="Forside" /></td>
  </form>
</table>
<?php
function valider_ovelse($ovelse)
{
    $feilstring = null;
    
    if(!$ovelse->getFornavn())
    {
        $ovelse->setFornavn(""); 
        $feilstring .="Fornavnet må være mellom 2 og 20 tegn"; 
    }
    if(!$ovelse->getEtternavn())
    {
        $ovelse->setEtternavn(""); 
        $feilstring .= "Etternavnet må være mellom 2 og 30 tegn";
    }
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
    if(!$ovelse->getType())
    {
        $ovelse->setType(""); 
        $feilstring .="Det må være mellom 2 og 25 tegn.  <br/>"; 
    }
    if(!$ovelse->getNationalitet())
    {
        $ovelse->setNationalitet("");
        $feilstring .="Må inneholde fra 2 til 40 tegn. "; 
    }
    return $feilstring;
}
if(isset($_REQUEST["Reg"]))
{
    
    $ovelse = new Ovelse_utoverklasse($_REQUEST['Fornavn'],$_REQUEST['Etternavn'],$_REQUEST['Dato'],$_REQUEST['Tid'],$_REQUEST['Type'],$_REQUEST['Nationalitet']);
    $feilstring = valider_ovelse($ovelse);
    
    if($feilstring==null)
    {
         
        $feilstring .=$ovelse->lagre_Ovelse_utoverklasse_db();
    }
    else 
     {
        echo "Feil for ikke lagt til! : <br/>";
     }
}
?>
