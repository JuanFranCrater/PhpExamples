<?php
include_once 'app.php';
$app = new App();

    $app->validateSession();
$username=$_SESSION['user'];
App::show_head("Reservas");
App::menu();
echo '<div class="container">';
echo '<h2 class=\"text-center\">Bienvenido, '.$username.'</h2>';
?>
<?php
$resulset = $app->getDao()->getReservasByUsuario($username);
$reservas = $resulset->fetchAll();
    
if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
}
else 
{
    // No hay sectores en la dependencia
    if (count($reservas) == 0) {
        echo '<p> No ha reservado ningun aula</p>';
    }
    else {
    // Hay datos que mostrar
        try {
            echo "
        
            <table class=\"table table-bordered table-striped\">";
            
            echo "<thead class=\"thead-default\"> <tr> <th> Aula </th> <th> Horario </th> <th> Dia </th> <th> Nombre Usuario </th><th> Cancelar Reserva </th> </tr> </thead>";
            
            foreach ($reservas as $item) {
                echo "<tr> <td> " .$app->getDao()->getNameAulaById($item['IDAula']). "</td>";
                echo "<td> " .$app->getDao()->getTramoById($item['IDTramo']). "</td>";
                echo "<td> " .$item['Dia']. "</td>";
                echo "<td> " .$username."";
                echo "<td>
                <a href=\"cancelarReserva.php?idUser=".$item['IDUsuario']."&idAula=".$item['IDAula']."&idTramo=".$item['IDTramo']."&Dia=".$item['Dia']."\" onclick=\"return confirm('Are you sure?')\">Cancelar</a>
                </td>";
            }
            echo "</table>";
        }
        catch (Exception $e) {
            echo "<p>Error en la consulta</p>";
        }
    }
}
echo '</div>';
App::show_footer();
?>