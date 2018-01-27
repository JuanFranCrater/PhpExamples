<?php
include_once 'app.php';
$app = new App();
$app->validateSession();

App::show_head("Aulas");
App::menu();
echo '<div class="container">';
echo '<h2 class=\"text-center\">Aulas</h2>';

$resulset = $app->getDao()->getAulas();
$aulas = $resulset->fetchAll();
    
if (!$resulset) {
    echo '<p>Error en la base de datos</p>';
}
else 
{
    // No hay sectores en la dependencia
    if (count($aulas) == 0) {
        echo '<p> No ha reservado ningun aula</p>';
    }
    else {
    // Hay datos que mostrar
        try {
            echo "
        
            <table class=\"table table-bordered table-striped\">";
            
            echo "<thead class=\"thead-default\"> <tr> <th> Nombre </th> <th> Description </th> <th> Nombre corto </th> <th> Ubicacion </th><th> Tic </th><th> Numero Ordenadores </th> </tr> </thead>";
            
            foreach ($aulas as $item) {
                echo "<tr> <td> " .$item['Name']. "</td>";
                echo " <td> " .$item['Description']. "</td>";
                echo " <td> " .$item['Shortname']. "</td>";
                echo " <td> " .$item['Ubicacion']. "</td>";
                echo " <td> " .$item['TIC']. "</td>";
                echo " <td> " .$item['NumOrdenadores']. "</td></tr>";
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