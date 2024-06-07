<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu page</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <nav class="menu-bar">
        <a href="home.php">Home</a>
        <a href="products.php">Products</a>
        <?php
            session_start();
            if(isset($_SESSION['usertype']) && $_SESSION['usertype'] == "admin"){
                echo "<a href='admin/index.php'>Dashboard</a>";
            }
        ?>
        <a href="help.php">Help</a>
        <a href="cart.php">Cart</a>
        
        <?php
            
            if (isset($_SESSION['username'])){
                // currently logged in 
                echo "<a href='profile.php'>Logout</a>";
            } else {
                // currently logged out
                echo "<a href='login.php'>Login</a>";   
            }
        ?>
    </nav>
</body>
</html>