<?php

print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Titulo de la WEB</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
   /**
    * Una variable estatica se inicializa en la primera llamada de la funcion pero el valor de esa variable
    *no se pierde. Se utiliza en funciones RECURSIVAS. 
    */
    function contado_visitas()
    {
        static $visitas = 0;
        static $visitas = 1+2;//esto es correcto en PHP 5.6 and above
       /* static $visitas = sqrt(121);*/ // no se puede utilizar en la inicializacion de una constante el resultado de una funcion
        echo "<p>Se ha visitado la página: ".$visitas." veces";
        $visitas++;
    }
    $titulo="Ámbito Estático";
    print "<h1>$titulo</h1>";
    contado_visitas();
    contado_visitas();
print "
    </body>
</html>
";
?>