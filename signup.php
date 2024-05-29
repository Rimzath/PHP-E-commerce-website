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
        <form class="signup-form">
            <h2>Sign Up</h2>
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
</body>
</html>
