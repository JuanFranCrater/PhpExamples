<?php
function show_head($titulo){
    print " <!DOCTYPE html>
    <html lang=\"es\">
        <head>
            <title>".$titulo."</title>
            <meta charset=\"utf-8\"/>
        </head>
        <body> ";
        print "<h1>$titulo</h1>"; 
}

function show_footer()
{
        
print "
</body>
</html>
";
}

?>