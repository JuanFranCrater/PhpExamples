<?php
include_once '../app.php';
$app = new App();

    $app->validateSession();

App::show_head("Inventario Producto");
App::menu();?>
<?php
App::show_footer();
?>