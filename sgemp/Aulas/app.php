<?php

include_once 'daoAula.php';

class App{
    protected $dao;

    function __construct()
    {
        $this->dao=new Dao();
    }
    function getDao()
    {
        return $this->dao;
    }

    /**
     * Función que guarda el nombre de usuario en la variable $SESSION
     * cuando el usuario se ha logueado (login.php)
     */
    function init_session($user)
    {
        if(!isset($_SESSION['user']))
        {
            $_SESSION['user']=$user;
        }
    }
    /**
     * Función que elimina una sesion previamente creada
     */
    function invalidate_session()
    {
        if(isset($_SESSION['user']))
        {
            unset ($_SESSION['user']);

        }
        session_destroy();
        $this->showLogin();
    }
    /**
     * Función que comprueba si se esta logeado
     */
    function validateSession()
    {
        session_start();
        if(!$this->isLogged())
        {
            $this->showLogin();
        }
    }

    /**
     * Funcion que comprueba si el usuario ha inicializado sesión
     */
    function isLogged()
    {
        return isset($_SESSION['user']);
    }
    /**
     * Funcion que redirige a Login
     */
    function showLogin()
    {
        header('Location: login.php');
    } 
    function show_head($titulo){
        print " <!DOCTYPE html>
        <html lang=\"es\">
            <head>
                <meta charset=\"utf-8\"/>
                <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                <title>".$titulo."</title>
                <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css\">
                <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js\"></script>
                <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js\"></script>
                <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js\"></script>
            </head>
            <body>
            "; 
            
    }
    
    /**
     * Función que obtiene todas las dependencias de la base de datos
     */
    function log_out()
    {
        echo '<form action="logout.php">
        <input type="submit" value="Log Out" class="btn btn-primary"/>
        </form>';
    }
   

    function menu()
    {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Inicio.php">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
            Aulas
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="aulas.php">Buscar Aula</a>
          </div>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          Reservas
        </a>
        <div class="dropdown-menu">
        <a class="dropdown-item" href="reservas.php">Listar reservas del usuario</a>
        </div>
      </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <form action="logout.php">
          <input type="submit" value="Log Out" class="btn btn-primary pull-right"/>
          </form>
          
          </ul>
        </div>
      </nav>';
    }
    function create_confirm_Dialog($message,$true,$false)
    {
        echo '<script> 
        function confirmDialog() { 
        ar txt; 
        var r = confirm("'.$message.'"); 
        if (r == true) { 
         '.$true.' 
        } else { 
        '.$false.' 
         } 
        } 
</script>
        ';
    }
    function create_dialog()
    {
       
    }
    function show_footer()
    {     
    print "
    </body>
    </html>
    ";
    }
}
    

?>