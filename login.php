<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Login</h1>
    </header>

    <div class="container">
        <form method="post" action="login_process.php">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn">Login</button>
        </form>

        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
    </div>
</body>
</html>
