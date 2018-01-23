<?php
    include_once 'app.php';
    session_start();
   App:: show_head("Inicio de sesión");
   ?>
  
   <div class="container">
   <div class="row align-items-center">
      <div class="col-12 col-md-4 offset-md-4 offset-col-3">
      <h2 class="form-signin-heading text-center">Inicie sesion</h2>
          <form method="POST" action="<?= $_SERVER['PHP_SELF'];?>" class="form-signin">
           <div class="form-group">
              <label for="inputUser" class="col-form-label">Usuario</label>
              <input type="text" name="user" class="form-control"  id="inputUser" value="" autofocus="autofocus" required="required"/>
           </div>
           <div class="form-group">
              <label for="inputPassword" class="col-form-label">Contraseña</label>
              <input type="password" name="password" class="form-control" id="inputPassword" value="" required="required"/>
           </div>
           <div class="text-center">
           <button class="btn btn-primary" type="submit">Iniciar Sesion</button>
           </div>
          </form>
          <div class="text-center">
          <a href="registro.php">
          ¿No tienes cuenta?¡¡Create una!!
           </a>
          </div>
      </div><!-- Col-->
   </div><!-- Row-->
  </div><!-- Container-->
   <?php
       if($_SERVER['REQUEST_METHOD']=="POST")
       {
           $user=$_POST['user'];
           $password=$_POST['password'];
           if(empty($user))
           {
               echo "<p>Debe introducir un nombre de usuario</p>";
           }else if(empty($password))
           {
               echo "<p>Debe introducir una contraseña</p>";
           }else{
               //Realizamos la conexión a la base de datos, y se comprueba si el usuario existe.
               $app= new App();
               
               if(!$app->getDao()->isConnected())
               {

                   echo "<p>".$app->getDao()->error."</p>";
               
                }elseif($app->getDao()->validateUser($user,$password)){
                   //guardaremos la sesion de usuario 
                   $app->init_session($user);
                   //redireccionamos a otra pagina
                   echo "<script language=\"javascript\">window.location.href=\"inicio.php\"</script>";
               }else{
                   echo "<p>Usuario incorrecto</p>";
               }
           }
       }
      App::show_footer();
   ?>