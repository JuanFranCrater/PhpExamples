<?php

echo'
<div class="container">
  <form method="POST" action="<?= $_SERVER[\'PHP_SELF\'];?>">
    <div class="form-group">
      <label for="name">Nombre:</label>
      <input type="text"  maxlength="100" class="form-control" id="name" placeholder="Introduce el nombre" name="name" required="required">
    </div>
   
    <button type="submit" class="btn btn-primary">Añadir</button>
  </form>
</div>
';
?>