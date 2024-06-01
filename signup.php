<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="signup-container">
        <form class="signup-form" action="signup.php" method="post">
            <h2>Sign Up</h2>
            <div class="form-group">
                <label for="username">Name</label>
                <input type="text" id="name" name="name" required placeholder="enter your name here">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required placeholder="enter your username here">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="enter email here">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="enter password here">
            </div>
            <div class="form-group">
                <label for="password">Conform Password</label>
                <input type="password" id="password" name="re-password" required placeholder="re-enter password here">
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    <?php
        include 'conn.php';
        
        if(!isset($_POST['password']) || !isset($_POST['re-password'])){
            return;
        }

        if ($_POST['password'] !== $_POST['re-password']){
            echo "<script>alert('Password Mismatch');</script>";
            echo "<script>location.href='signup.php'</script>";
            retun;
        }
        
        if(!isset($_POST['username']) || !isset($_POST['password'])){
            return;
        }
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO signup (name, username, password , user_type)
        VALUES ('$name', '$username', '$password' , 'customer')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('New Record created successfully');</script>";
            echo "<script>location.href='home.php'</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    ?>
</body>
</html>
