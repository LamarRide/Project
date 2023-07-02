<!DOCTYPE html>
<html>
<head>
    <title>Ride Sharing Application - Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Sign Up</h1>
    </header>

    <div class="container">
        <form method="post" action="signup_process.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn">Sign Up</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
    </div>
</body>
</html>
