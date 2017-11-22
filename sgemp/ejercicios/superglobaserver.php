<?php

print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Titulo de la WEB</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
   
    print_r($_SERVER);
   print "<hr/>";

    var_dump($_SERVER);
    print "<hr/>";
    echo "El nombre del servidor es: ".$_SERVER['SERVER_NAME'];
print "
    </body>
</html>
";
?>