<?php
    class Persona{
        public $nombre;
        private $apellido;
        private $edad;
    
        public function saludar()
        {
            return "Hola soy ". $this->nombre." ".$this->apellido." y tengo ".$this->edad." años";
        }
        //constructor
        public function __construct($nombre,$apellido,$edad)
        {
            $this->nombre=$nombre;
            $this->apellido=$apellido;
            $this->edad=$edad;
        }
        public function getNombre()
        {
                return $this->nombre;
        }
        public function getApellido()
        {
            return $this->apellido;
        }
        public function getEdad()
        {
            return $this->edad;
        }
        public function __destruct()
        {
            echo "Objeto destruido";
        }
    }
?>