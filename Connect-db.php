<?php

$db_knytte = mysql_connect("localhost", "root","");
if (!$db_knytte)
{
    trigger_error(mysql_error());
    return "Kunne ikke koble til server";
     
}
$db = mysql_select_db("test"); 
if(!$db)
{
    trigger_error(mysql_error());
    return "Fant ikke databasen"; 
}

?>
