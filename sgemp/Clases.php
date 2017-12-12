<?php
include_once "Persona.php";
class Estudiante extends Persona
{
   private $codigo;
   private $matricula;

    function __construct($nombre,$apellido,$edad,$codigo,$matricula)
    {
        parent::__construct($nombre,$apellido,$edad);
        print"Constructor de Estudiante";
        $this->codigo=$codigo;
        $this->matricula=$matricula;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo=$codigo;
    }
    public function getMatricula()
    {
        return $this->matricula;
    }
    public function setMatricula($matricula)
    {
        $this->matricula=$matricula;
    }
    function __destruct(){

    }
}
?>