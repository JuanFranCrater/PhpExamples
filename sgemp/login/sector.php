<?php
include_once '../app.php';
$app=new App();
$app->validateSession();

App::show_head("Sectors");
App::menu();

echo '<div class="container">';
echo '<h1 class=\"text-center\"> Listado de sectores por dependencia </h1>';
if (!isset($_GET['idDependency'])) {
    $resulset = $app->getDao()->getSectors();
    
}
else {
    $idDependency= $_GET['idDependency'];
    $resulset = $app->getDao()->getSectorsByDependency($idDependency);

    echo '<h2 class=\"text-center\">Dependencia elegida: '.$idDependency. '</h2>';
}

    $sector = $resulset->fetchAll();
    // ¿Error en la base de datos
    if (!$resulset) {
        echo '<p>Error en la base de datos</p>';
            }
    else {
        // No hay sectores en la dependencia
        if (count($sector) == 0) {
            echo '<p> No hay nada que mostrar</p>';
        }
        else {
        // Hay datos que mostrar
            try {
                echo "
            
                <table class=\"table table-bordered table-striped\">";
                
                echo "<thead class=\"thead-default\"> <tr> <th> ID </th> <th> Nombre </th> <th> Nombre Corto </th> <th> Descripcion </th><th> Eliminar </th> </tr> </thead>";
                
                foreach ($sector as $item) {
                    echo "<tr> <td> " .$item['ID']. "</td>";
                    echo "<td> " .$item['name']. "</td>";
                    echo "<td> " .$item['shortname']. "</td>";
                    echo "<td> " .$item['description']. "";
                    echo '<td>
                    <a href="deleteSec.php?idSector='.$row["ID"].'">
                    <img border="0" alt="" src="delete.png" width="30" height="30">
                    </a></td>
                    ';
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