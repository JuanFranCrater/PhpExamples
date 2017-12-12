<?php
include_once "biblioteca.php";
include_once "Persona.php";
include_once "Clases.php";


show_head("Mi primera clase en PHP");

//Se crea el objeto persona
$persona = new Persona("Paco","Rodriguez","28");
echo"<p>".$persona->saludar()."</p>";
$array = array("DEINT","SGEMP","EINE","PSPRO","PMOV");

$estudiante = new Estudiante("Paco","Rodriguez","28","codigo",$array);
echo"<p>".$estudiante->saludar()."</p>";


//Array de personas
$personas = array();
$personas[0]=$persona;
$personas[1]=$estudiante;
    for($i = 0; $i<count($personas);$i++)
    {
            if($personas[$i]instanceof Estudiante)
            {
                echo "<h2>Estudiante</h2>";
                echo "<p>Nombre: ".$personas[$i]->getNombre()."</p>";
                echo "<p>Apellido: ".$personas[$i]->getApellido()."</p>";
                echo "<p>Edad: ".$personas[$i]->getEdad()."</p>";
                echo "<p>Codigo: ".$personas[$i]->getCodigo()."</p>";
                echo "<p>Modulos Matriculados: ".print_r($personas[$i]->getMatricula(),true)."</p>";
               
            }else{
                echo "<h2>Persona</h2>";
                echo "<p>Nombre: ".$personas[$i]->getNombre()."</p>";
                echo "<p>Apellido: ".$personas[$i]->getApellido()."</p>";
                echo "<p>Edad: ".$personas[$i]->getEdad()."</p>";
            }
    }

//Para eliminar un objeto
unset($persona);
unset($estudiante);


show_footer();
?>