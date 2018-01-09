<?php
include_once '../app.php';
$app = new App();

    $app->validateSession();

App::show_head("Inventario Producto");
?>
<div class="container">
<h2>Productos</h2>       
<table class="table table-condensed">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Nombre Corto</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    
   
    <?php
    $statement=$app->getDao()->getDependency();
    if($statement->rowCount()>0)
    {
       while($row = $statement->fetch()) {
        echo '   
        <tr>
        <td>'. $row["ID"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["Shortname"].'</td>
        <td>'.$row["Description"].'</td>
        
      </tr>
      ';
       }
    } else {
        echo "0 results";
    }
    ?>
    
  </tbody>
</table>
<form action="logout.php">
<input type="submit" value="Log Out" class="btn btn-primary"/>
</form>
</div>

<?php
App::show_footer();
?>