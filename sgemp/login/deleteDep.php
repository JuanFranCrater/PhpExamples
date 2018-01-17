<?php
include_once '../app.php';
$app = new App();
$app->validateSession();

if (isset($_GET['idDependency'])) {
    if($app->getDao()->deleteDependency($_GET['idDependency']))
    {
        echo "<script language=\"javascript\">window.location.href=\"dependency.php\"</script>";
    }else{
        echo "<script language=\"javascript\">window.location.href=\"error.php\"</script>";
    }
}else{
    echo "<script language=\"javascript\">window.location.href=\"error.php\"</script>";
}

?>