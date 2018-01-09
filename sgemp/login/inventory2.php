<?php
include_once '../app.php';
$app = new App();

    $app->validateSession();
$resultset=$app->getDependency();

App::show_head("Inventario Producto");

/*
while($dependency=$resultset->fetch())
{
    echo $dependency[0]. " " .$dependency[1];
}
*/
$dependency=$resultset->fetchAll();

foreach($dependency as $fila)
{
    echo $fila['id']." ".$fila['name']." ".$fila['shortname']." ".$fila['description'];
}
?>

<?php
App::show_footer();
?>