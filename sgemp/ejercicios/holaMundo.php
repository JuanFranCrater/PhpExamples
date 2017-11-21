<?php

echo "<!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Hola Mundo</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body>";
        $saludo = "Hola Mundo";
        $pregunta = "¿Cómo estas?";
        echo "<h1>$saludo</h1>";
        print "<p> $pregunta </p>";//en los dos primeros casos interpreta la variable dentro de las comillas

        echo "<p>".$saludo."</p>";//concatena el resultado con comilla doble
        echo '<p>$saludo</p>'; //esto no interpreta la variable (comilla simple)
        echo '<p>'.$saludo.'</p>';//concatena la variable pero con comilla simple
 

  echo "</body>
</html>"
?>
