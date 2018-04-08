<?php

class Ovelse_utoverklasse
{
    protected $Fornavn;
    protected $Etternavn;
    protected $Dato;
    protected $Tid; 
    protected $Type; 
    protected $Nationalitet;
    
    function __construct($fornavn,$etternavn,$dato,$tid,$type,$nationalitet)
    {
        $this->Fornavn = $fornavn;
        $this->Etternavn = $etternavn;
        $this->Dato = $dato;
        $this->Tid = $tid;
        $this->Type = $type;
        $this->Nationalitet = $nationalitet;
        
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
    
    public function setNationalitet($nationalitet)
    {
        $this->Nationalitet = $nationalitet; 
    }
    public function getNationalitet()
    {
        return $this->Nationalitet; 
    }
    
    public function lagre_Ovelse_utoverklasse_db()
    {
        $fornavn = $this->getFornavn();
        $etternavn = $this->getEtternavn();
        $dato = $this->getDato();
        $tid = $this->getTid(); 
        $type = $this->getType();
        $nationalitet = $this->getNationalitet();
        
        
        include 'Connect-db.php';
        $sql = "Insert into ovelse_utover(Fornavn,Etternavn,Dato,Tid,Type,Nationalitet)";
        $sql.= "Values ('$fornavn','$etternavn','$dato','$tid','$type','$nationalitet')";
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
            echo "Utøveren er påmeldt";
        }
    }
}

?>