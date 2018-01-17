<?php
include_once '../app.php';
$app = new App();
$app->validateSession();
if (isset($_GET['name'])&&isset($_GET['shortName'])) {
    if(!isset($_GET['description']))
    {
        $description="---";
    }else{
        $description=$_GET['description'];
    }
    if(!isset($_GET['idDependency']))
    {
        $idDependency=NULL;
    }else{
        $idDependency=$_GET['idDependency'];
    }
    if($app->getDao()->addSector($_GET['name'],$_GET['shortName'],$description,$idDependency))
    {
        echo "<script language=\"javascript\">window.location.href=\"sector.php\"</script>";
    }else{
        echo "<script language=\"javascript\">window.location.href=\"error.php\"</script>";
    }
}else{
    echo "<script language=\"javascript\">window.location.href=\"addSector.php\"</script>";
}
?>