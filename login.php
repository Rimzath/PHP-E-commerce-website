<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="server.php" method="post">
            <h2>Login</h2>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" id="name" name="name" required placeholder="enter your name here">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="enter your password here">
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
