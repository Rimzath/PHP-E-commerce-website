<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include("conn.php");

    // retrieve data from login form input fields
    $formUsername = $_POST['name'];
    $formPassword = $_POST['password'];

    $sql = "SELECT name, username, password, user_type FROM signup WHERE username='$formUsername' and password='$formPassword'";
    $result = $conn->query($sql); 

    session_start();

    if (isset($_SESSION['username'])){
            echo "<script>alert('You are already logged in.')</script>";
            echo "<script>location.href='products.php'</script>";
            return;
    } else {
        $row = $result->fetch_assoc();
        
        // if username and password didn't match
        if($row == null){
            echo "<script>alert('Incorrect Details');</script>";
            echo "<script>location.href='products.php'</script>";
            return;
        }
        // store user details in a session
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['usertype'] = $row['user_type'];

        // if checkbox checked save username and password in cookies
        if(isset($_GET["check"])){
            setCookie('username', $formUsername);
            setCookie('password', $formPassword);
        }

        echo "<script>location.href='products.php'</script>";
        return;

    }

    ?>
</body>
</html>