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
    if($app->getDao()->addDependency($_GET['name'],$_GET['shortName'],$description))
    {
        echo "<script language=\"javascript\">window.location.href=\"dependency.php\"</script>";
    }else{
        echo "<script language=\"javascript\">window.location.href=\"error.php\"</script>";
    }
}else{
    echo "<script language=\"javascript\">window.location.href=\"addDependency.php\"</script>";
}
?>