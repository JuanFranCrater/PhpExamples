<?php
include_once 'app.php';
$app = new App();

    $app->validateSession();
App::show_head("Reservas");
App::menu();
echo '<div class="container">';
?>
<?php
$resulset = $app->getDao()->getReservas();
$reservas = $resulset->fetchAll();
    
if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
}
else 
{
    // No hay sectores en la dependencia
    if (count($reservas) == 0) {
        echo '<p> No hay reservada ningun aula</p>';
    }
    else {
    // Hay datos que mostrar
        try {
            echo "
        
            <table class=\"table table-bordered table-striped\">";
            
            echo "<thead class=\"thead-default\"> <tr> <th> Aula </th> <th> Horario </th> <th> Dia </th> <th> Nombre Usuario </th></tr> </thead>";
            
            foreach ($reservas as $item) {
                echo "<tr> <td> " .$app->getDao()->getNameAulaById($item['IDAula']). "</td>";
                echo "<td> " .$app->getDao()->getTramoById($item['IDTramo']). "</td>";
                echo "<td> " .$item['Dia']. "</td>";
                echo "<td> " .$app->getDao()->getNameUserById($item['IDUsuario']). "</td>";
                
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