<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Styles/login.css">
    <link rel="stylesheet" href="../Styles/common.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>

            <button type="submit">Login</button>
        </form>

        <div class="link">
            <p>Don't have an account? <a href="registration.php">Create one here</a>.</p>
        </div>
    </div>
</body>
</html>
