<?php
    include_once '../biblioteca.php';
    show_head("Inicio de sesión");
?>

    <div class="container">

        <form method="POST" action="<? $_SERVER['PHP_SELF'];?>" class="form-signin">
          <h2 class="form-signin-heading">Inicie sesion</h2>
          <div class="form-group">
            <label for="inputUser" class="col-form-label">Usuario</label>
            <input type="text" name="user" class="form-control"  id="inputUser" value="" autofocus="autofocus" required="required"/>
          </div>
          <div class="form-group">
            <label for="inputPassword" class="col-form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="inputPassword" value="" required="required"/>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesion</button>
        </form>
    </div>
        
    <?php
    show_footer();
?>