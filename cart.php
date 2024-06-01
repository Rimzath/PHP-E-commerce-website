<?php
include("menu.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
</head>
<body>
    <p>This is the cart page</p>
    <?php

    
        
        if (isset($_SESSION["username"])) {
            return;
        } else {
            echo "<script>location.href='login.php'</script>";
        }
        
    ?>
    
</body>
</html>