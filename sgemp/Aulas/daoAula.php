<?php
define ("DATABASE","Aulas");
define ("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER","www-data");
define ("MYSQL_PASSWORD","www-data");

define ("TABLE_USER","Users");
define ("TABLE_AULAS","Aula");
define ("TABLE_RESERVAS","Reservas");
define ("COLUMN_USER_ID","name");
define ("COLUMN_USER_USERNAME","Username");
define ("COLUMN_USER_PASSWORD","Password");
define ("COLUMN_USER_NAME","Name");
define ("COLUMN_USER_SURNAME","Surname");
define ("COLUMN_USER_BIRTHDATE","BirthDate");
define ("COLUMN_USER_EMAIL","Email");


class Dao{

    protected $conn;
    public $error;

    //metodo que indica si existe una conexion a la base de datos
    function isConnected()
    {
        return $this->conn==null?false:true;
    }

    function __construct()
    {
        try{
                $this->conn= new PDO(MYSQL_HOST,MYSQL_USER,MYSQL_PASSWORD);
        }catch(PDOException $e)
        {
            $this->error= "Error en la conexion: ".$e->getMessage();
            //Ponemos la conexion a null para que el metodo IsConnected DevuelvaFalso
            $this->conn=null;
        }
    }
 
    function validateUser($user,$password)
    {
        try{
            $sql="SELECT * FROM ".TABLE_USER." WHERE ".COLUMN_USER_USERNAME."='".$user."' AND ".COLUMN_USER_PASSWORD."='".sha1($password)."'";
            $statement=$this->conn->query($sql);
            if($statement->rowCount()==1)
            {
                return true;
            }
            return false;
        }catch(PDOException $e){
            echo "Error en la conexion: ".$e->getMessage();
        }
    }
function addUser($user,$password)
    {
        try{
        $sql="INSERT INTO ".TABLE_USER."(".COLUMN_USER_ID.",".COLUMN_USER_USERNAME.", ".COLUMN_USER_PASSWORD.", ".COLUMN_USER_NAME.", ".COLUMN_USER_SURNAME.", ".COLUMN_USER_BIRTHDATE.", ".COLUMN_USER_EMAIL.") VALUES (NULL,'".$username."','".sha1($password)."','".$name."','".$surname."','".$birthdate."','".$email."')";
        $this->conn->exec($sql);
        return true;
        }
        catch(PDOException $e)
        {
            $this->error= "Error: ".$e->getMessage();
            echo $this->error;
        return false;
        }
    }
      
    function _destruct()
    {
        if($this->isConnected())
        {
        $this->conn=null;
        unset($this->error);
        }
    }
}
?>
