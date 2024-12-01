<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../Styles/login.css">

</head>
<body>
    <div class="container">
        <h1>Reset Password</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" required>
            </div>

            <div class="form-group">
                <label for="password">New Password:</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" required>
            </div>

            <button type="submit" name="submit">Reset Password</button>
        </form>

        <div class="link">

            <p>To vist <a href="registration.php">Login click here</a>.</p>

        </div>
    </div>
</body>

<?php
include "../Utilities/Databaseconnectivity.php";

if (isset($_POST['submit'])){
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    if ($password === $confirmPassword){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $db = new DataBase();
        if ($db->createConnection()){
            $userExists = $db->verifyUserExist($username);

            if ($userExists>0){
                $userData = $db->fetchUserData($username);
                echo "<script>alert('{$userData['fName']} is  registered');</script>";
            }
            else{
                echo "<script>alert('$username is not registered first you have to register.');</script>";

            }
        }
    }
}
?>
</html>
