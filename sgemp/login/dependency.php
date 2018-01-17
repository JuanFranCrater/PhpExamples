<?php
include_once '../app.php';
$app = new App();

    $app->validateSession();

App::show_head("Dependencias");
App::menu();

?>
<div class="container">

<h2>Dependencias</h2>       

    <?php
      $statement=$app->getDao()->getDependency();
      if($statement->rowCount()>0)
      {
      echo '
      <table class="table table-condensed">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Nombre Corto</th>
          <th>Description</th>
          <th>Sector</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>';
       while($row = $statement->fetch()) {
        echo '   
        <tr>
        <td>'. $row["ID"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["Shortname"].'</td>
        <td>'.$row["Description"].'</td>
        <td>
        <a href="sector.php?idDependency='.$row["ID"].'">
        <img border="0" alt="" src="icon.png" width="30" height="30">
        </a>
        </td>
        <td>';
        if($app->getDao()->exitsSectorByidDependency($row["ID"]))
        {
          echo '<a href="deleteDep.php?idDependency='.$row["ID"].'">
          <img border="0" alt="" src="delete.png" width="30" height="30">
          </a>
          </td>
        </tr>';
        }else{
          echo '
          <img border="0" alt="" src="notdelete.png" width="30" height="30" title="Esta dependencia contiene sectores, eliminelos antes de eliminar esta dependencia">
          </td>
        </tr>';
        }
        
       
    
    }
       echo '</tbody></table>';
    } else {
        echo "0 results";
    }
    ?>
</div>
<?php
App::show_footer();
?>