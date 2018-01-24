<?php
    include_once 'app.php';
   App:: show_head("Registro de usuario");
?>

<div class="container">
  <form method="POST" action="<?= $_SERVER['PHP_SELF'];?>">

    <div class="form-group">
      <label for="username">Nombre de usuario:</label>
      <input type="text"  maxlength="100" class="form-control" id="username" placeholder="Introduce tu nombre de usuario" name="username" required="required">
    </div>

    <div class="form-group">
    <label for="email">Correo Electronico:</label>
    <input type="text"  maxlength="100" class="form-control" id="email" placeholder="Introduce tu correo electronico" name="email" required="required">
    </div>

    <div class="form-group">
    <label for="name">Nombre:</label>
    <input type="text"  maxlength="100" class="form-control" id="name" placeholder="Introduce tu nombre" name="name" required="required">
    </div>

    <div class="form-group">
    <label for="surname">Apellidos:</label>
    <input type="text"  maxlength="100" class="form-control" id="surname" placeholder="Introduce tus apellidos" name="surname" required="required">
    </div>

    <div class="form-group">
    <label for="password">Contraseña:</label>
    <input type="password"  maxlength="100" class="form-control" id="password" placeholder="Introduce tu contraseña" name="password" required="required">
    </div>
    <div class="form-group">
    <label for="passwordAgain">Confirmacion de Contraseña:</label>
    <input type="password"  maxlength="100" class="form-control" id="passwordAgain" placeholder="Introduce de nuevo la contraseña" name="passwordAgain" required="required">
    </div>

<div class="form-group">
<label for="birthDate">Fecha de Nacimiento:</label>
<input type="date" class="form-control" id="birthDate" name="birthDate" required="required">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Añadir</button>
  </form>
</div>

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
    
    $password=$_POST['password'];
    $passwordAgain=$_POST['passwordAgain'];
 

    if($password===$passwordAgain)
    {
      $username=$_POST['username'];
      $email=$_POST['email'];
      $name=$_POST['name'];
      $surname=$_POST['surname'];
      $birthDate=$_POST['birthDate'];

      $app= new App();
      
      if(!$app->getDao()->isConnected())
      {
          echo "<p>".$app->getDao()->error."</p>";
       }elseif($app->getDao()->addUser($username,$password,$name,$surname,$birthDate,$email)){
        echo "<script language=\"javascript\">window.location.href=\"login.php\"</script>";
      }else{
        echo "<h3>Error en la base de datos</h3>";
      }
    }else{
      echo "<h3>Las contraseñas no coinciden, vuelva a escribirlas</h3>";
    }

}
App::show_footer();
?>