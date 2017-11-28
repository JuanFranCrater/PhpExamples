<?php
include "biblioteca.php";
show_head("Hipotenusa de los dos catetos");
$cateto1=$_REQUEST["cateto1"];
$cateto2=$_POST["cateto2"];//si el dato viene mediante metodo post, se puede recoger por _post
$mostrar=isset($_POST["mostrar"]);//Si la variable esta definida y no es null

echo "<p>Cateto 1: ".$cateto1."</p>";
echo "<p>Cateto 2: ".$cateto2."</p>";
function hipotenusa ($cateto1,$cateto2)
{
    return sqrt(pow($cateto1,2)+pow($cateto2,2));
}
if(!empty($cateto1)||!empty($cateto2))
{
if($mostrar)
{
echo "<h3>La hipotenusa de los catetos: ".$cateto1." y ".$cateto2." es: ".hipotenusa($cateto1,$cateto2)."</h3>";
}else{
echo "<h3>La hipotenusa de los catetos dados es: ".hipotenusa($cateto1,$cateto2)."</h3>";  
}
}else{
    echo "<h3>No se han introducido los datos</h3>";
}
show_footer();
    
?>