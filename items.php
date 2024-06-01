<?php include 'conn.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
</head>
<body>
    
    <?php
    

        if(!isset($_SESSION["username"]))
        {
            header("location:login.php");
        }
    ?>
    
    
</body>
</html>