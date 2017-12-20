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
      <th>Descripcion</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    
   
    <?php
    $statement=$app->getDao()->getProducts();
    if($statement->rowCount()>0)
    {
       while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        echo '   
        <tr>
        <td>'. $row["ID"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["description"].'</td>
        <td>'.$row["price"].'</td>
      </tr>
      ';
       }
    } else {
        echo "0 results";
    }
    ?>
    
  </tbody>
</table>
<input type="button" value="Log Out" class="button" onClick="Location: logout.php"  />
</div>

<?php
App::show_footer();
?>