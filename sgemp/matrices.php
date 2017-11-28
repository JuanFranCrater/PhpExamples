<?php

print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Matrices</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
    $titulo = "Matrices";
    print "<h1>$titulo</h1>";
    //Las matrices no son tipadas y se pueden tener diferentes tipos
    $nacimientos=["Santiago","Ramón y Cajal",1852];
    echo "$nacimientos[0]"." "."$nacimientos[1] nacido en "."$nacimientos[2]";

    //Las matrices pueden ser multidimentsionales y asociativas
    $informacion=[["nombre"=>"Santiago","apellido"=>"Ramón y Cajal","anio"=>1852],
                ["nombre"=>"Juan","apellido"=>"Casals","anio"=>1932]];
    $informacion2= array (array("nombre"=>"Santiago","apellido"=>"Ramón y Cajal","anio"=>1852),
                    array("nombre"=>"Juan","apellido"=>"Casals","anio"=>1932));
   echo "<h3> Primer Array</h3>";
   echo "<p>".print_r($informacion,true)."</p>";
   echo "<h3> Segundo Array</h3>";
   echo "<p>".print_r($informacion2,true)."</p>";

   //En las matrices multidimentsionales usaremos la concatenacion porque no hace la conversion a String de la Key(lo hace con las llaves pero Lourdes no, so mimimim)
   echo "<p>Datos del segundo médico: {$informacion2[1]["nombre"]}</p>";//Este no lo usa Lourdes
   echo "<p>Datos del segundo médico: ".$informacion2[1]["nombre"]."</p>";//SOLUCION DE CLASE, ARRIBA NO 
   
   echo "<h3>Pecularidades o Sobreescrituras</h3>";

   //Si varios elementos utilizan la misma clave solo se utiliza la última
   //PHP convierte las claves
 
   $abecedario = array(
        1=>"a",
        "1"=>"b",
        1.5=>"c",
        true=>"d"
   );

     //PHP no distingue entre array indexados(con key númerica y en orden ) con asociativos
   echo "<p>".print_r($abecedario,true)."</p>";

   $arraymizto = array(
    "uno"=>"a",
    "dos"=>"b",
    100=>"c",
    -100=>"d"
);
echo "<p>".print_r($arraymizto,true)."</p>";
echo "<h3>Array Sorpresa</h3>";
$arraySorpresa = array(
    "a",
    "b",
    6=>"c",
    "d"
);
//d tiene la key 7
$arraySorpresa[]=array();
$arraySorpresa[]=array(1,2,3);
echo "<p>".print_r($arraySorpresa,true)."</p>";
echo "<h1>foreach</h1>";
echo "<p>Número de elementos del array es:".count($arraySorpresa)."</p>";
echo "<p>Se debe usar foreach para recorrer los array asociativos</p>";
$i=0;
foreach($arraySorpresa as $elemento){
    if(!is_array($elemento))
    echo "<p>Posicion: ".$i." contiene: ".$elemento."</p>";
    else
    echo "<p>Posicion: ".$i." contiene: ".print_r($elemento.true)."</p>";
    $i++;
}
   print "
    </body>
</html>
";
?>