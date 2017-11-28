<?php
include "biblioteca.php";
show_head("Hipotenusa de los dos catetos");
$cateto1=$_REQUEST["cateto1"];
$cateto2=$_POST["cateto2"];//si el dato viene mediante metodo post, se puede recoger por _post

echo "<p>Cateto1: ".$cateto1."</p>";
echo "<p>Cateto2: ".$cateto2."</p>";
function hipotenusa ($cateto1,$cateto2)
{
    return sqrt(pow($cateto1,2)+pow($cateto2,2));
}
echo "<h3>La hipotenusa de los catetos dados es: ".hipotenusa($cateto1,$cateto2)."</h3>";
show_footer();
    
?>