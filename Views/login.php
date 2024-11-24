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
        <form method="post"> <!-- Redirect to Loginprocess.php -->
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

            <p>Don't have an account? <a href="registration.php">Create one here</a>.
            <br>Forgot the Password <a href="resetPassword.php">Reset Now</a>.</p>

        </div>
    </div>
</body>

<?php
include "../Utilities/Databaseconnectivity.php";

if (isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $db = new DataBase();
    if ($db->createConnection()){
        $userExists = $db->verifyUserExist($username);

        if ($userExists>0){
            $userData = $db->fetchUserData($username);
            echo "<script>alert('{$userData['fName']} is  registered');</script>";

            //login main logic 

        }else{
            echo "<script>alert('$username not registered, Registration is needed before login!');</script>";
        }
    }
}

?>
</html>
