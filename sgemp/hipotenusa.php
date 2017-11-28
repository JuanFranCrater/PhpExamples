<?php

print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Hipotenusa de los dos catetos</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
    $titulo = "Hipotenusa de los dos catetos";
    print "<h1>$titulo</h1>";
    $cateto1=$_REQUEST["cateto1"];
    $cateto2=$_REQUEST["cateto2"];
    
    echo "<p>Cateto1: ".$cateto1."</p>";
    echo "<p>Cateto2: ".$cateto2."</p>";

    echo "<h3>La hipotenusa de los catetos dados es: ".sqrt(pow($cateto1,2)+pow($cateto2,2))."</h3>";
    
print "
    </body>
</html>
";
?>