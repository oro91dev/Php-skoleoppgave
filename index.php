<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title></title>
    </head>
    <body>
        <h1>Velkommen til registrering til VM</h1>

    <p>Trykk p� publikum/ut�ver ogs� velg �velse for � registrere deg selv</p>
    
 <table>
<form action="Regutover.php" method="POST"> 
 
<tr>
    <td><input type="submit" name="RegU" value="Registrer Ut�ver" /></td>

 
 </form>
 
     <form action="Regpublikum.php" method="POST"> 
 
    <td><input type="submit" name="RegP" value="Registrer Publikum" /></td>

 
 </form>
<form action="Ovelse.php" method="POST"> 
 

    <td><input type="submit" name="Ovelse" value="Registrer �velse" /></td>
 
</form>

    
<form action="PameldU.php" method="POST">
    
    <td><input type="submit" name="PaameldU" value="P�melding for Ut�ver" /></td>      
    
</form>

<form action="PameldP.php" method="POST">
    
    <td><input type="submit" name="PaameldU" value="P�melding for Publikum" /></td>      
    
</form>
</tr>
 </table>     
     
<table>
 <tr>
<form action="Liste2.php" method="POST">
    
    <td><input type="submit" name="ListepU/P1" value="Liste over registrerte Ut�vere/Publikum" /></td>      
    
</form>

<form action="Liste1.php" method="POST">
    
    <td><input type="submit" name="ListepU/P2" value="Liste over p�meldte Ut�vere/Publikum" /></td>      
    
</form>
   
<form action="Update.php" method="POST">
    
    <td><input type="submit" name="O/SO" value="Oppdater/Slett �velse" /></td>      
    
</form>

 </tr>
  </table>

 </form>
    </body>
</html>
      