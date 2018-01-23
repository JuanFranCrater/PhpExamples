<?php
include_once '../app.php';
$app = new App();

    $app->validateSession();

App::show_head("Añadir Sector");
App::menu();
?>
<div class="container">
  <h2>Dependencia</h2>
  <form action="addSec.php">
    <div class="form-group">
      <label for="name">Nombre:</label>
      <input type="text"  maxlength="100" class="form-control" id="name" placeholder="Introduce el nombre" name="name" required="required">
    </div>
    <div class="form-group">
      <label for="shortName">Nombre Corto:</label>
      <input type="text"  maxlength="3" class="form-control" id="shortName" placeholder="Introduce el nombre corto" name="shortName" required="required">
    </div>
    <div class="form-group">
    <label for="description">Description:</label>
    <textarea class="form-control" maxlength="250" placeholder="Introduce una description" name="description" id="description" rows="3"></textarea>
    </div>
    <div class="form-group">

    </div>
    <button type="submit" class="btn btn-primary">Añadir</button>
  </form>
</div>
<?php
App::show_footer();
?>