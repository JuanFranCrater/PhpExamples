<?php
include_once "biblioteca.php";
include_once "Triangulo.php";
show_head("Hipotenusa de los dos catetos");
$cateto1=$_REQUEST["cateto1"];
$cateto2=$_POST["cateto2"];
$mostrar=isset($_POST["mostrar"]);
$triangulo= new Triangulo($cateto1,$cateto2);
if(!empty($cateto1)||!empty($cateto2))
{
    
echo "<p>Cateto 1: ".$cateto1."</p>";
echo "<p>Cateto 2: ".$cateto2."</p>";

if($mostrar)
{
echo "<h3>La hipotenusa de los catetos: ".$triangulo->getCateto1()." y ".$triangulo->getCateto2()." es: ".$triangulo->getHipotenusa()."</h3>";
}else{
    echo "<h3>La hipotenusa de los catetos dados es: ".$triangulo->getHipotenusa()."</h3>"; 
}
}else{
    echo "<h3>No se han introducido los datos</h3>";
}
show_footer();
?>