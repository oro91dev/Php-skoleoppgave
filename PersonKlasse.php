<?php
abstract class Person
{
    protected $Fornavn;
    protected $Etternavn;
    protected $Adresse;
    protected $Postnr;
    protected $Poststed;
    protected $Telefonnr;

    
    function __construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr) 
    {
        $this->Fornavn=$fornavn;
        $this->Etternavn=$etternavn;
        $this->Adresse=$adresse;
        $this->Postnr=$postnr;
        $this->Poststed=$poststed;
        $this->Telefonnr=$telefonnr;
    }
    public function setFornavn($fornavn)
    {
        $this->Fornavn=$fornavn;
    }
    public function setEtternavn($etternavn)
    {
        $this->Etternavn=$etternavn;
    }
    public function setAdresse($adresse)
    {
        $this->Adresse=$adresse;
    }
    public function setPostnr($postnr)
    {
       $this->Postnr=$postnr;
    }
    public function setTelefonnr($telefonnr)
    {
       $this->Telefonnr=$telefonnr;
    }
    
    public function getFornavn()
    {
        return $this->Fornavn;
    }
    public function getEtternavn()
    {
        return $this->Etternavn;
    }
    public function getAdresse()
    {
        return $this->Adresse;
    }
    public function getPostnr()
    {
        return $this->Postnr;
    }
    public function getPoststed()
    {
        return $this->Poststed;
    }
    
    public function getTelefonnr()
    {
        return $this->Telefonnr;
    }
    public function valider_fornavn($fornavn)
    {
        return preg_match("/[a-åA-Å.]{2,20}/", $fornavn);
    }
    
    public function valider_etternavn($etternavn)
    {
        return preg_match("/[a-åA-Å.]{2,30}/", $etternavn);
    }
    public function valider_adresse($adresse)
    {
        return preg_match("/[a-åA-Å.]{2,50}/", $adresse); 
    }
    public function valider_postnr($postnr)
    {
        return preg_match("/[0-9]{4}/", $postnr);
    }
    public function valider_poststed($poststed)
    {
        return preg_match("/[a-åA-Å0-9. ]{2,30}/", $poststed);
    }
    public function valider_telefonnr($telefonnr)
    {
        return preg_match("/[0-9]{8}/", $telefonnr);
    }
    
    public function lagre_Person_db()
    {    
        
        $fornavn=$this->getFornavn();
        $etternavn=$this->getEtternavn();
        $adresse=$this->getAdresse();
        $postnr=$this->getPostnr();
        $poststed=$this->getPoststed();
        $telefonnr=$this->getTelefonnr();
        
        include 'connect-DB.php';
        $sql = "Insert into person(Fornavn,Etternavn,Adresse,Postnr,Poststed,Telefonnr)";
        $sql.= "Values ('$fornavn','$etternavn','$adresse','$postnr','$poststed', '$telefonnr')";
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
    }
       
}

Class Utover extends Person
{
    protected $Nationalitet;
    
    public function __construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr, $nationalitet)
    {
        parent::__construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr);
        $this->Nationalitet=$nationalitet;
    }
    public function setBillettype($nationalitet)
    {
        $this->nationalitet=$nationalitet; 
    }

    public function getNationalitet()
    {
        return $this->Nationalitet; 
    }
    public function valider_Nationalitet($nasjonalitet)
    {
        return preg_match("/[a-åA-Å.]{2,40}/", $nasjonalitet); 
    }
     public function lagre_Utover_db()
    {
        $fornavn=$this->getFornavn();
        $etternavn=$this->getEtternavn();
        $adresse=$this->getAdresse();
        $postnr=$this->getPostnr();
        $poststed=$this->getPoststed();
        $telefonnr=$this->getTelefonnr();
        $nationalitet=$this->getNationalitet();
        
        include 'connect-DB.php';
        $sql = "Insert into utover(Fornavn,Etternavn,Adresse,Postnr,Poststed,Telefonnr,Nationalitet)";
        $sql.= "Values ('$fornavn', '$etternavn', '$adresse',
                '$postnr', '$poststed', '$telefonnr', 
                '$nationalitet')";
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
            echo "Utøver registrert";
        }
    }
    
    
    
}

class Publikum extends Person
{
    protected $Billettype;
    
    public function __construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr,$billettype)
    {
        parent::__construct($fornavn, $etternavn, $adresse, $postnr, $poststed, $telefonnr);
        $this->Billettype=$billettype;
    }
    public function setBillettype($billettype)
    {
        $this->Billettype=$billettype; 
    }
    public function getBillettype()
    {
        return $this->Billettype; 
    }
    public function valider_billettype($billettype)
    {
        return preg_match("/[a-åA-Å.]{2,15}/", $billettype); 
    }
    public function lagre_Publikum_db()
    {
        $fornavn=$this->getFornavn();
        $etternavn=$this->getEtternavn();
        $adresse=$this->getAdresse();
        $postnr=$this->getPostnr();
        $poststed=$this->getPoststed();
        $telefonnr=$this->getTelefonnr();
        $billettype =$this->getBillettype(); 
        
        include 'connect-DB.php';
        $sql = "Insert into publikum(Fornavn,Etternavn,Adresse,Postnr,Poststed,Telefonnr,Billettype)";
        $sql.= "Values ('$fornavn', '$etternavn', '$adresse',
                '$postnr', '$poststed', '$telefonnr','$billettype')";
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
            echo "Publikum registrert";
        }
     }
}
?>