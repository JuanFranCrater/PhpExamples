<?php
define ("DATABASE","inventory");
define ("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER","www-data");
define ("MYSQL_PASSWORD","www-data");

define ("TABLE_USER","user");
define ("COLUMN_USER_NAME","name");
define ("COLUMN_USER_PASSWORD","password");
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
            $this->conn=null;
        }
    }

    function validateUser($user,$password)
    {
        try{
            $sql="SELECT * FROM ".TABLE_USER." WHERE ".COLUMN_USER_NAME."='".$user."' AND ".COLUMN_USER_PASSWORD."='".sha1($password)."'";
            echo $sql;
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