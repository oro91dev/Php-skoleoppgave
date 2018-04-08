<?php

class Ovelse_publikumklasse
{
    protected $Fornavn;
    protected $Etternavn;
    protected $Dato;
    protected $Tid; 
    protected $Type; 
    protected $Billettype;
    
    function __construct($fornavn,$etternavn,$dato,$tid,$type,$billettype)
    {
        $this->Fornavn = $fornavn;
        $this->Etternavn = $etternavn;
        $this->Dato = $dato;
        $this->Tid = $tid;
        $this->Type = $type;
        $this->Billettype = $billettype;
        
    } 
    public function setFornavn($fornavn)
    {
        $this->Fornavn = $fornavn;
    }
    public function getFornavn()
    {
        return $this->Fornavn;
    }
    public function setEtternavn($etternavn)
    {
        $this->Etternavn = $etternavn;
    }
    public function getEtternavn()
    {
        return $this->Etternavn;
    }
    public function setDato($dato)
    {
        $this->Dato = $dato; 
    }

    public function getDato()
    {
        return $this->Dato;
    }
    public function setTid($tid)
    {
        $this->Tid = $tid; 
    }
    public function getTid()
    {
        return $this->Tid;
    }

    public function setType($type)
    {
        $this->Type = $type; 
    }
    public function getType()
    {
        return $this->Type; 
    }
    
    public function setBillettype($billettype)
    {
        $this->Billettype = $billettype; 
    }
    public function getBillettype()
    {
        return $this->Billettype; 
    }
    
    public function lagre_Ovelse_publikumklasse_db()
    {
        $fornavn = $this->getFornavn();
        $etternavn = $this->getEtternavn();
        $dato = $this->getDato();
        $tid = $this->getTid(); 
        $type = $this->getType();
        $billettype = $this->getBillettype();
        
        
        include 'Connect-db.php';
        $sql = "Insert into ovelse_publikum(Fornavn,Etternavn,Dato,Tid,Type,Billettype)";
        $sql.= "Values ('$fornavn','$etternavn','$dato','$tid','$type','$billettype')";
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
            echo "Publikum er påmeldt";
        }
    }
}

?>