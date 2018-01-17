<?php
define ("DATABASE","inventory");
define ("MYSQL_HOST","mysql:host=localhost;dbname=".DATABASE);
define ("MYSQL_USER","www-data");
define ("MYSQL_PASSWORD","www-data");

define ("TABLE_USER","user");
define ("TABLE_PRODUCTOS","Productos");
define ("TABLE_DEPENDENCIAS","Dependency");
define ("TABLE_SECTORES","Sector");
define ("COLUMN_USER_NAME","name");
define ("COLUMN_USER_PASSWORD","password");
define ("COLUMN_DEPENDENCY_NAME","name");
define ("COLUMN_DEPENDENCY_SHORTNAME","shortname");
define ("COLUMN_DEPENDENCY_ID","ID");
define ("COLUMN_DEPENDENCY_DESCRIPTION","description");
define ("COLUMN_SECTOR_NAME","name");
define ("COLUMN_SECTOR_SHORTNAME","shortname");
define ("COLUMN_SECTOR_ID","ID");
define ("COLUMN_SECTOR_DESCRIPTION","description");
define ("COLUMN_SECTOR_IDDEPENDENCY","idDependency");

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
    function getProducts()
    {   try{
        $sql="Select * from ".TABLE_PRODUCTOS;
        $statement=$this->conn->query($sql);
        return $statement;
    }catch(PDOException $e)
    {
        $this->error="Error al consultar la tabla ".TABLE_PRODUCTOS;
    }
    }
    function getDependency()
    {   
        try{
            $sql="Select * from ".TABLE_DEPENDENCIAS;
            $statement=$this->conn->query($sql);
            return $statement;
        }catch(PDOException $e)
        {
            $this->error="Error al consultar la tabla ".TABLE_DEPENDENCIAS;
        }
    }
    function addDependency($name,$shortName,$description)
    {   
        try{
            $sql="INSERT INTO ".TABLE_DEPENDENCIAS." (".COLUMN_DEPENDENCY_ID.", ".COLUMN_DEPENDENCY_NAME.", ".COLUMN_DEPENDENCY_SHORTNAME.", ".COLUMN_DEPENDENCY_DESCRIPTION.") VALUES (NULL, '".$name."','".$shortName."', '".$description."')";
             $this->conn->exec($sql);
            return true;
            }
            catch(PDOException $e)
            {
            return false;
            }
    }

    function deleteDependency($idDependency)
    {   
        try{
            $sql="delete from ".TABLE_DEPENDENCIAS." where ".COLUMN_DEPENDENCY_ID." = ".$idDependency;
             $this->conn->exec($sql);
            return true;
            }
            catch(PDOException $e)
            {
            return false;
            }
    }
    function addSector($name,$shortName,$description,$idDependency)
    {   
        try{
            $sql="INSERT INTO ".TABLE_SECTORES." (".COLUMN_SECTOR_ID.", ".COLUMN_SECTOR_NAME.", ".COLUMN_SECTOR_SHORTNAME.", ".COLUMN_SECTOR_DESCRIPTION.", ".COLUMN_SECTOR_IDDEPENDENCY.") VALUES (NULL, '".$name."','".$shortName."', '".$description."', '".$idDependency."')";
             $this->conn->exec($sql);
            return true;
            }
            catch(PDOException $e)
            {
            return false;
            }
    }

    function deleteSector($idSector)
    {   
        try{
            $sql="delete from ".TABLE_SECTORES." where ".COLUMN_SECTOR_ID." = ".$idSector;
             $this->conn->exec($sql);
            return true;
            }
            catch(PDOException $e)
            {
            return false;
            }
    }
    function getSectorsByDependency($idDependency)
    {   
        try{
            //$sql="Select * from ".TABLE_SECTORES." where ".COLUMN_SECTOR_IDDEPENDENCY." = ?";
            $sql="Select * from ".TABLE_SECTORES." where ".COLUMN_SECTOR_IDDEPENDENCY." = :idDependency";
            $statement=$this->conn->prepare($sql);
            $statement->bindParam(':idDependency',$idDependency, PDO::PARAM_INT);
            $statement->execute();
            //return $statement->execute(array($idDependency)); con la interrogacion
           //return $statement->execute(array(':idDependency'=>$idDependency));
            return $statement;
        }catch(PDOException $e)
        {
            $this->error="Error al consultar la tabla ".TABLE_SECTORES;
        }
    }

    function exitsSectorByidDependency($idDependency)
    {
        try{
            
            $sql="Select * from ".TABLE_SECTORES." where ".COLUMN_SECTOR_IDDEPENDENCY." = :idDependency";
            $statement=$this->conn->prepare($sql);
            $statement->bindParam(':idDependency',$idDependency, PDO::PARAM_INT);
            $statement->execute();
            $sector = $statement->fetchAll();
            if (count($sector) == 0) {
                return true;
            }else{
                return false;
            }
        }catch(PDOException $e)
        {
            $this->error="Error al consultar la tabla ".TABLE_SECTORES;
        }
    }
    function getSectors()
    {   

        try{
            $sql="Select * from ".TABLE_SECTORES;
            $statement=$this->conn->query($sql);
            return $statement;
        }catch(PDOException $e)
        {
            $this->error="Error al consultar la tabla ".TABLE_SECTORES;
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