<?php
include_once '../app.php';
$app = new App();
$app->validateSession();
App:: show_head("Error");
App::show_footer();
?>