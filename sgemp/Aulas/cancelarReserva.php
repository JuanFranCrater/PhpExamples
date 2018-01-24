
<?php
include_once 'app.php';
$app = new App();
    $app->validateSession();
if (isset($_GET['idUsuario'])){
    $idUsuario = $_GET['idUsuario'];
}
if (isset($_GET['idAula'])){
    $idAula = $_GET['idAula'];
}
if (isset($_GET['idTramo'])){
    $idTramo = $_GET['idTramo'];
}
if (isset($_GET['Dia'])){
    $date = $_GET['Dia'];
}

$app->getDao()->cancelarReserva($idUsuario,$idAula,$idTramo,$Dia);

echo "<script language='javascript'>window.location.href='inicio.php'</script>";

?>