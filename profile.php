<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>


        <script>
            function logout(){
                location.href='logout.php'
            }
        </script>
        <?php
            session_start();
            
            if (!isset($_SESSION['username'])) {
                return;
            }
            echo "<h1>".$_SESSION['name']."</h1>";
            echo "<h3>Username : ".$_SESSION['username']."</h3>";
            echo "<p>User Type : ".$_SESSION['usertype']."</p>";
        ?>

        <button onclick="logout()">Log Out</button>
        <hr>

        
</body>
</html>