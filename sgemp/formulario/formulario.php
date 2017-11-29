<?php
print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Formulario Datos</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
    $titulo = "Formulario Datos";
    print "<h1>$titulo</h1>";
$nombre=$_POST["nombre"];//
$apellido=$_POST["apellido"];//
$correo=$_POST["correo"];//
$dia=$_POST["dia"];//
$mes=$_POST["mes"];//
$ano=$_POST["ano"];//
$ciudad=$_POST["ciudad"];

if(!empty( $_POST["codigoPostal"])&&isset($_POST["codigoPostal"]))
{
$codidoPostal=$_POST["codigoPostal"];
}

$pais=$_POST["pais"];
$nombreUsuario=$_POST["nombreUsuario"];
$contrasena=$_POST["contrasena"];
if(isset( $_POST["ofertas"]))
$ofertas=$_POST["ofertas"];
$contrasenaAgain=$_POST["contrasenaAgain"];

if($contrasena==$contrasenaAgain)
{
if(!empty($apellido))
{

    echo "<p>El usuario ".$nombreUsuario."  con nombre: ".$nombre." ".$apellido." y correo: ".$correo." se ha registrado</p>";

}else{

    echo "<p>El usuario ".$nombreUsuario."  con nombre: ".$nombre." y correo: ".$correo." se ha registrado</p>";
}
if($dia!="Dia"&&$mes!="Mes"&&$ano!="Año")
echo "<p>Fecha de nacimiento del usuario: ".$dia."/".$mes."/".$ano."</p>";
if(!empty($codidoPostal)&&$pais!="Pais")
{
echo "<p>Vivienda en: ".$ciudad."(".$codidoPostal.") en ".$pais."</p>";
}else{

    echo "<p>Vivienda en: ".$ciudad."</p>";
    
}
echo "<p>Contraseña de usuario: ".$contrasena."</p>";
if(isset( $_POST["ofertas"]))
{
if($ofertas=="dia")
{
    echo "<p>El usuario recibira boletines de iDESWEB cada dia</p>";
}else if($ofertas=="semana")
{    
    echo "<p>El usuario recibira boletines de iDESWEB una vez a la semana</p>";
    

}else if($ofertas=="mes")
{
    echo "<p>El usuario recibira boletines de iDESWEB una vez al mes</p>";
    
}    
}
}else{
    echo "<p>El usuario no ha introducido correctamente la comprobacion de contraseña</p>";
    
}

print "
</body>
</html>
";
?>
