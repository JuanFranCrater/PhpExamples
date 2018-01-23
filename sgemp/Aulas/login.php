<?php
    include_once 'app.php';
    session_start();
   App:: show_head("Inicio de sesión");
   App:: show_login();
   
   
       if($_SERVER['REQUEST_METHOD']=="POST")
       {
           $user=$_POST['user'];
           $password=$_POST['password'];
           if(empty($user))
           {
               echo "<p>Debe introducir un nombre de usuario</p>";
           }else if(empty($password))
           {
               echo "<p>Debe introuducir una contraseña</p>";
           }else{
               //Realizamos la conexión a la base de datos, y se comprueba si el usuario existe.
               $app= new App();
               
               if(!$app->getDao()->isConnected())
               {
                   echo "<p>".$app->error."</p>";
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