<?php
include_once '../app.php';
$app = new App();
$app->validateSession();

if (isset($_GET['idSector'])) {
    if($app->getDao()->deleteSector($_GET['idSector']))
    {
        echo "<script language=\"javascript\">window.location.href=\"sector.php\"</script>";
    }else{
        echo "<script language=\"javascript\">window.location.href=\"error.php\"</script>";
    }
}else{
    echo "<script language=\"javascript\">window.location.href=\"error.php\"</script>";
}

?>