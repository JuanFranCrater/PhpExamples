<?php

$nombre=$_REQUEST["nombre"];
$apellido=$_POST["apellido"];
$correo=$_POST["correo"];
$dia=$_POST["dia"];
$mes=$_POST["mes"];
$ano=$_POST["ano"];
$ciudad=$_POST["ciudad"];
$codidoPostal=$_POST["codidoPostal"];
$pais=$_POST["pais"];
$nombreUsuario=$_POST["nombreUsuario"];
$contrasena=$_POST["contrasena"];
$ofertas=$_POST["ofertas"];
$nombreUsuario=$_POST["nombreUsuario"];
$mostrar=isset($_POST["mostrar"]);//Si la variable esta definida y no es null

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

    
?>