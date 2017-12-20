<?php
include_once 'dao.php';
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
                <link href=\"/ejercicios/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\">
            </head>
            <body> 
            <script src=\"http://code.jquery.com/jquery.js\"></script>
            
            <script src=\"js/bootstrap.min.js\"></script>
            "; 
            
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