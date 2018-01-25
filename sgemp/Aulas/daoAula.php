<?php
define ("DATABASE","Aulas");
define ("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER","www-data");
define ("MYSQL_PASSWORD","www-data");

define ("TABLE_USER","Users");
define ("COLUMN_USER_ID","ID");
define ("COLUMN_USER_USERNAME","Username");
define ("COLUMN_USER_PASSWORD","Password");
define ("COLUMN_USER_NAME","Name");
define ("COLUMN_USER_SURNAME","Surname");
define ("COLUMN_USER_BIRTHDATE","BirthDate");
define ("COLUMN_USER_EMAIL","Email");

define ("TABLE_AULAS","Aula");
define ("COLUMN_AULAS_SHORTNAME","Shortname");
define ("COLUMN_AULAS_ID","ID");

define("TABLE_TRAMOS","Horarios");
define ("COLUMN_TRAMOS_TRAMO","Tramo");
define ("COLUMN_TRAMOS_ID","ID");

define ("TABLE_RESERVAS","Reservas");
define ("COLUMN_RESERVAS_IDUSUARIO","IDUsuario");
define ("COLUMN_RESERVAS_IDAULA","IDAula");
define ("COLUMN_RESERVAS_IDTRAMO","IDTramo");
define ("COLUMN_RESERVAS_DIA","Dia");


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
            }else{
            return false;
            }
        }catch(PDOException $e){
            echo "Error en la conexion: ".$e->getMessage();
        }
    }

    function getReservas()
    {
        try{
           
            $sql="Select * from ".TABLE_RESERVAS;

            $statement=$this->conn->prepare($sql);

            $statement->execute();

            return $statement;
        }catch(PDOException $e)
        {
            $this->error="Error al consultar la tabla ".TABLE_SECTORES;
        }
    }

    function getReservasByUsuario($username)
    {
        try{
            $id=$this->getIdUsuarioByUsername($username);
            $sql="Select * from ".TABLE_RESERVAS." where ".COLUMN_RESERVAS_IDUSUARIO." = :id";
            $statement=$this->conn->prepare($sql);
            $statement->bindParam(':id',$id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        }catch(PDOException $e)
        {
            $this->error="Error al consultar la tabla ".TABLE_SECTORES;
        }
    }


    function getIdUsuarioByUsername($username)
    {
        try{
            $sql="SELECT ".COLUMN_USER_ID." FROM ".TABLE_USER." WHERE ".COLUMN_USER_USERNAME."='".$username."'";
            $statement=$this->conn->query($sql);
            $name=$statement->fetch();
            return $name['ID'];
            
        }catch(PDOException $e){
            echo "Error en la conexion: ".$e->getMessage();
        }
    }

    //Terminar los getName
    function getNameAulaById($id)
    {
        try{
            $sql="SELECT ".COLUMN_AULAS_SHORTNAME." FROM ".TABLE_AULAS." WHERE ".COLUMN_AULAS_ID."='".$id."'";
            $statement=$this->conn->query($sql);
            $name=$statement->fetch();
            
            return $name['Shortname'];
    }catch(PDOException $e){
        echo "Error en la conexion: ".$e->getMessage();
    }
    }

    function getNameUserById($id)
    {
        try{
            $sql="SELECT ".COLUMN_USER_USERNAME." FROM ".TABLE_USER." WHERE ".COLUMN_USER_ID."='".$id."'";
            
            $statement=$this->conn->query($sql);
            $name=$statement->fetch();
        return $name['Username'];
    }catch(PDOException $e){
        echo "Error en la conexion: ".$e->getMessage();
    }
    }

    function getTramoById($id)
    {
        try{
            $sql="SELECT ".COLUMN_TRAMOS_TRAMO." FROM ".TABLE_TRAMOS." WHERE ".COLUMN_TRAMOS_ID."='".$id."'";
            $statement=$this->conn->query($sql);
            $name=$statement->fetch();
        return $name['Tramo'];
    }catch(PDOException $e){
        echo "Error en la conexion: ".$e->getMessage();
    }
    }
    
    function addUser($username,$password,$name,$surname,$birthdate,$email)
    {
        try{
            if($this->validateUser($username,$password))
            {
                echo '<h3>Ya existe un usuario con ese nombre de usuario</h3>';
                return false;
            }else{
             
            $sql="INSERT INTO `".TABLE_USER."` (`".COLUMN_USER_ID."`, `".COLUMN_USER_USERNAME."`, `".COLUMN_USER_PASSWORD."`, `".COLUMN_USER_NAME."`, `".COLUMN_USER_SURNAME."`, `".COLUMN_USER_BIRTHDATE."`, `".COLUMN_USER_EMAIL."`) VALUES (NULL, '".$username."', '".sha1($password)."', '".$name."', '".$surname."', '".$birthdate."', '".$email."')";
            $this->conn->exec($sql);
            if($this->validateUser($username,$password))
            {
               return true;
            }else{
               return false;
            }
        }
        }catch(PDOException $e)
        {
            $this->error= "Error: ".$e->getMessage();
            echo $this->error;
        return false;
        }
    }

    function cancelarReserva($idUsuario,$idAula,$idTramo,$Dia)
    {
        try { 
            $sql="DELETE FROM ".TABLE_RESERVAS." WHERE ".COLUMN_RESERVAS_IDUSUARIO."='".$idUsuario."' and ". 
            COLUMN_RESERVAS_IDAULA."='".$idAula."' and ".COLUMN_RESERVAS_IDTRAMO."='".$idTramo."' and ". 
            COLUMN_RESERVAS_DIA."='".$Dia."'"; 
            $this->conn->exec($sql); 
            } catch(PDOException $e){ 
                $this->error= "Error: ".$e->getMessage();
                echo $this->error;
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
