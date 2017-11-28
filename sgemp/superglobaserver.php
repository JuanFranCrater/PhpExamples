<?php

print " <!DOCTYPE html>
<html lang=\"es\">
    <head>
        <title>Titulo de la WEB</title>
        <meta charset=\"utf-8\"/>
    </head>
    <body> ";
    echo "<pre>".print_r($_SERVER,true)."</pre>";
   print "<hr/>";
   echo "<pre>";
    var_dump($_SERVER);
    print "<hr/>";
    echo "El nombre del servidor es: ".$_SERVER['SERVER_NAME'];
    echo "</pre>";
print "
    </body>
</html>
";
?>