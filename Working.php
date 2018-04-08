Class Employee extends Person
{
    protected $Info;

    public function __construct($firstname, $lastname, $height, $weight, $address, $postalcode, $birthday, $mobile, $phone, $email, $password, $salt, $info)
    {
        parent::__construct($firstname, $lastname, $height, $weight, $address, $postalcode, $birthday, $mobile, $phone, $email, $password, $salt);
        $this->Info=$info;

    }
    public function setInfo($info)
    {
        $this->Info=$info;
    }
    
    public function getInfo()
    {
        return $this->Info;
    }

    public function save_Employee_db()
    {    
          
        $firstname=$this->getFirstname();
        $lastname=$this->getLastname();
        $height=$this->getHeight();
        $weight=$this->getWeight();
        $address=$this->getAddress();
        $postalcode=$this->getPostalcode();
        $birthday=$this->getBirthday();
        $mobile=$this->getMobile();
        $phone=$this->getPhone();
        $email=$this->getEmail();
        $password=$this->getPassword();
        $salt=$this->getSalt();
        $info=$this->getInfo();
        

        $db=new mysqli("localhost","root","","ofc");
        $db->autocommit(false);
        $sql = "Insert into Person(PNr,Firstname,Lastname,Height,Weight,Address,Postalcode,Birthday,Mobile,Phone,Email,Password, Salt)";
        $sql.= "Values ('','$firstname','$lastname', '$height','$weight','$address','$postalcode','$birthday','$mobile', '$phone','$email','$password', '$salt')";
        $resultat = $db->query($sql);
        $EPNr = $db->insert_id;
        $sql="Insert into Employee(EPNr,Info) Values('$EPNr','$info')";
        $resultat = $db->query($sql);
        $db->commit();
        $db->close();

        if(!$resultat)
        {
            trigger_error(mysql_error());
            return "Warning , can not insert into database";
        }
        elseif(mysql_affected_rows ()==0)
        {
            trigger_error("Insert return 0 rows");
            return "Warning, can not insert into database";
        }
    }
     
}