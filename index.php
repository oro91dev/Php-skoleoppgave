<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title></title>
    </head>
    <body>
        <h1>Velkommen til registrering til VM</h1>

    <p>Trykk på publikum/utøver også velg øvelse for å registrere deg selv</p>
    
 <table>
<form action="Regutover.php" method="POST"> 
 
<tr>
    <td><input type="submit" name="RegU" value="Registrer Utøver" /></td>

 
 </form>
 
     <form action="Regpublikum.php" method="POST"> 
 
    <td><input type="submit" name="RegP" value="Registrer Publikum" /></td>

 
 </form>
<form action="Ovelse.php" method="POST"> 
 

    <td><input type="submit" name="Ovelse" value="Registrer Øvelse" /></td>
 
</form>

    
<form action="PameldU.php" method="POST">
    
    <td><input type="submit" name="PaameldU" value="Påmelding for Utøver" /></td>      
    
</form>

<form action="PameldP.php" method="POST">
    
    <td><input type="submit" name="PaameldU" value="Påmelding for Publikum" /></td>      
    
</form>
</tr>
 </table>     
     
<table>
 <tr>
<form action="Liste2.php" method="POST">
    
    <td><input type="submit" name="ListepU/P1" value="Liste over registrerte Utøvere/Publikum" /></td>      
    
</form>

<form action="Liste1.php" method="POST">
    
    <td><input type="submit" name="ListepU/P2" value="Liste over påmeldte Utøvere/Publikum" /></td>      
    
</form>
   
<form action="Update.php" method="POST">
    
    <td><input type="submit" name="O/SO" value="Oppdater/Slett Øvelse" /></td>      
    
</form>

 </tr>
  </table>

 </form>
    </body>
</html>
      