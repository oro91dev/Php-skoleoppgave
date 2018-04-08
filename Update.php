
<h1>Oppdatering av øvelser</h1>


<p>Skriv inn verdier i datafeltene for å oppdatere</p>
<h4>NB! Dato og tid skrives på formen Dato(dd-mm-åååå) og Tid(00:00) </h4>
<form action="" method="POST">
    <table border="0">
        
        
         <tr>
            <td>ØvelseId</td><td><input type ="text" name ="Id"/></td>
        </tr>
        <tr>
            <td>Dato</td><td><input type ="text" name ="Endredato"/></td>
        </tr>
        <tr>
            <td>Tid</td><td><input type ="text" name ="Endretid"/></td>
        </tr>
         <tr>
            <td>Type øvelse</td><td><input type ="text" name ="Endretype"/></td>
        </tr>
  
        <tr>
            <td><input type="submit" name="Oppdater" value="Oppdater" /></td>
        </tr>
       
        
    </table>
</form>

<p>Skriv inn ØvelseId for øvelsen for å slette<p/>
<form action="" method="POST">
    <table border="0">
        
        
         <tr>
            <td>ØvelseId</td><td><input type ="text" name ="SlettId"/></td>
        </tr>
      

        <tr>
            <td><input type="submit" name="Slett" value="Slett" /></td>
        </tr>

    </table>
</form>


<form action="" method="POST">
    <table border="0">
  <tr>
          <td><input type="submit" name="Visovelse" value="Vis øvelser" /></td>
</form>
<form action="index.php" method="POST">
           
          <td><input type="submit" name="Forside" value="Forside" /></td>
        
     </tr>
    </table>
</form>
<?php

if(isset($_REQUEST["Slett"]))
{
    include "connect-db.php"; 
    
    $SlettId = $_REQUEST["SlettId"];
    $sql = "DELETE FROM ovelse WHERE Id = '$SlettId'"; 
    
    if(mysql_query($sql))
    {
        if(mysql_affected_rows()>0)
        {
            echo "Øvelsen er blitt slettet";
        }
        else
        {   
            echo "Fant ikke riktig id for sletting";
        }
    }
    else
    {
        echo mysql_error();
    }
    
}

if(isset($_REQUEST["Oppdater"]))
{
    include "connect-db.php";
    $sql =" UPDATE ovelse SET Dato = '".$_REQUEST["Endredato"]."',
            Tid = '".$_REQUEST["Endretid"]."',
            Type = '".$_REQUEST["Endretype"]."'";
    $sql .= "WHERE Id = '".$_REQUEST["Id"]."'";
    if(mysql_query($sql))
    {
        if(mysql_affected_rows()>0)
        {
            echo "Øvelsesdata er endret";
        }
        else
        {
            echo "Fant ikke øvelses id for endring"; 
        }
    }
    else
    {
        echo mysql_error(); 
    }
}

if(isset($_REQUEST["Visovelse"]))
{
    include "connect-db.php";
    $sql="SELECT * FROM ovelse";
    $resultat = mysql_query($sql);
    
    if(!$resultat)
    {
        echo "Feil i henting av data fra databasen";
    }
    else
    {
        $antRad = mysql_affected_rows(); 
        echo "ØvelseId   Dato   Tid   Type<br/>"; 
        
        for($i= 0; $i < $antRad; $i++)
        {
            $rad = mysql_fetch_array($resultat); 
            echo $rad["Id"]." - ".$rad["Dato"]." - ".$rad["Tid"]."  ".$rad["Type"]."<br/>";
        }
    }
}

?>