
<?php
include_once 'app.php';
$app = new App();
    $app->validateSession();
if (isset($_GET['idUser'])){
    $idUser = $_GET['idUser'];
}
if (isset($_GET['idAula'])){
    $idAula = $_GET['idAula'];
}
if (isset($_GET['idTramo'])){
    $idTramo = $_GET['idTramo'];
}
if (isset($_GET['Dia'])){
    $Dia = $_GET['Dia'];
}

$app->getDao()->cancelarReserva($idUser,$idAula,$idTramo,$Dia);

echo "<script language='javascript'>window.location.href='inicio.php'</script>";

?>