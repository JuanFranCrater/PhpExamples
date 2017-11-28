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
    print'
    <form action="hipotenusa.php" method="post">
    <p>Cateto 1: <input type="number" name="cateto1" /></p>
    <p>Cateto 2: <input type="number" name="cateto2" /></p>
    <p><input type="submit" /></p>
   </form>';
    
print "
    </body>
</html>
";
?>