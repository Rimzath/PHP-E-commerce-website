<?php
include("menu.php");

?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PRODUCTS PAGE</title>
    </head>
    <body>
    <h1>Welcome to Product Page</h1>

    <?php

    
        
        if (isset($_SESSION["username"])) {
            include 'items.php';
        } else {
            echo "<script>location.href='login.php'</script>";
        }
        
    ?>
        
            
    </body>
</html>