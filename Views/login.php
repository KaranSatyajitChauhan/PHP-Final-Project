<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Styles/login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit" name="submit">Login</button>
        </form>

        <div class="link">
            <p>Don't have an account? <a href="registration.php">Create one here</a>.</p>
            <br>Forgot the Password <a href="resetPassword.php">Reset Now</a>.
        </div>
    </div>
</body>

<?php
include "../Utilities/Databaseconnectivity.php";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    $db = new DataBase();
    if ($db->createConnection()) {
        // Check if user exists
        $userExists = $db->verifyUserExist($username);

        if ($userExists > 0) {
            $userData = $db->fetchUserData($username);
            
            // Verify the entered password against the stored hashed password
            if (password_verify($password, $userData['password'])) {
                echo "<script>alert('Login successful! Welcome, {$userData['fName']}');</script>";
                
                // If the password is correct, you can start a session and redirect the user
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['userData'] = $userData;
                $_SESSION['logged_in'] = true;
                
                // Redirect to the dashboard or another page
                header("Location: gameLevel.php"); // Replace with the actual page you want to redirect to
                exit();
            } else {
                echo "<script>alert('Invalid password!');</script>";
            }
        } else {
            echo "<script>alert('User not found. Please register.');</script>";
        }
    }
}
?>
</html>
