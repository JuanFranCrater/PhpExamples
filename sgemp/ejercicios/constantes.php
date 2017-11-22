<?php
/**
* En primer lugar se incluye los ficheros a usar
*   incluye(...);
*/

/**
*En segundo lugar se definen las constantes
*/
/*
NO se puede redefinir una constante const
*/
define("TRIANGULO",1);
define("CUADRADO",2);
define("RECTANGULO",3);
define("CIRCUNFERENCIA",4);
define("MAXVALUE",4);
define("MINVALUE",1);
const PI = 3.14;


$lado=3;
$base=3;
$altura=5;
$radio=5;

print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Área de una figura</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
    
    $figura = rand(MINVALUE,MAXVALUE);
    print "<h1>$figura</h1>";
    switch($figura)
    {
        case TRIANGULO:
        print area_triangulo();
        break;
        case CUADRADO:
        print area_cuadrado($lado);
        
        break;
        case RECTANGULO:
        print area_rectangulo();
        
        break;
        case CIRCUNFERENCIA:
        print area_rectangulo();
        
        break;
    }
   
    function area_triangulo()
    {
        //Para usar una variable que se ha definido fuera de la funcion, se antepone globla o se pasa por parámetro
     global $base, $altura;  
     //Si una variable se llama igual a otra global, usara la local
     //$base=0;
        return "El area del triangulo con base ".$base." y altura ". $altura." es ".$base*$altura/2;
    }
    function area_cuadrado(&$ladoEnt)
    {   
        return "El area del cuadrado con lado ". $ladoEnt. " es ".(pow($ladoEnt,2));
    }

    function area_rectangulo()
    {
        $baseR=6;
        $alturaR=7;
        return "El area del rectangulo con base ".$baseR." y altura ". $alturaR." es ".$baseR*$alturaR;
    }
    function perimetro_circunperencia()
    {
        global $radio;
       
        return "El perimetro de una circunferencia de radio ".$radio." es ". (2*PI*$radio);
    }

print "
    </body>
</html>
";
?>