<?php

print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Curiosidades tipos</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
    $titulo = "Curiosidades en los tipos";
    print "<h1>$titulo</h1>";
    $a = "12 manzanas";
    $b = "7 peras";
    echo "<p>La suma de manzanas y peras es: ".($a+$b)."</p>";//muestra la suma de los valores numericos
    $c="plátanos";
    $d="naranjas";
    echo "<p>La suma de plátanos y naranjas es: ".($c+$d)."</p>";//muestra cero
    
print "
    </body>
</html>
";
?>