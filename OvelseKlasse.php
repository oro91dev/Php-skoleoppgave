<?php

class OvelseKlasse
{
    protected $dato;
    protected $tid; 
    protected $type; 
    
    function __construct($dato,$tid,$type)
    {
        $this->dato = $dato;
        $this->tid = $tid;
        $this->type = $type;
    } 
    
    public function setDato($dato)
    {
        $this->dato = $dato; 
    }

    public function getDato()
    {
        return $this->dato;
    }
    public function setTid($tid)
    {
        $this->tid = $tid; 
    }
    public function getTid()
    {
        return $this->tid;
    }

    public function setType($type)
    {
        $this->type = $type; 
    }
    public function getType()
    {
        return $this->type; 
    }
    public function valider_type($type)
    {
        return preg_match("/[a-åA-Å.]{2,25}/", $type); 
    }
    
    public function lagre_Ovelse_db()
    {
        $dato = $this->getDato();
        $tid = $this->getTid();
        $type = $this->getType(); 
        
        include 'Connect-db.php';
        $sql = "Insert into ovelse(dato,tid,type)";
        $sql.= "Values ('$dato','$tid','$type')";
        $resultat = mysql_query($sql);
        if(!$resultat)
        {
            trigger_error(mysql_error());
            return "Feil , kunne ikke sette inn i databasen";
        }
        elseif(mysql_affected_rows ()==0)
        {
            trigger_error("Insert return 0 rows");
            return "Feil, kunne ikke sette inn i databasen";
        }
        else
        {
            echo "Øvelsen er registrert";
        }
    }
}

?>
