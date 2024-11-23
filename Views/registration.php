<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function validateField(field) {
            const value = $(field).val();
            const fieldName = $(field).attr('name');

            $.ajax({
                url: 'validate.php',
                type: 'POST',
                data: { field: fieldName, value: value },
                success: function(response) {
                    $('#' + fieldName + 'Error').text(response);
                }
            });
        }
    </script>
    <link rel="stylesheet" href="../Styles/registration.css">
</head>
<body>
    <div class="container">
        <h1>Create an Account</h1>
        <form method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" onkeyup="validateField(this)" required>
                <span id="firstNameError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" onkeyup="validateField(this)" required>
                <span id="lastNameError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" onkeyup="validateField(this)" required>
                <span id="usernameError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" onkeyup="validateField(this)" required>
                <span id="passwordError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" onkeyup="validateField(this)" required>
                <span id="confirmPasswordError" class="error"></span>
            </div>

            <button type="submit" name="submit">Register</button>
        </form>

        <div class="link">
            <p>Already have an account? <a href="login.php">Sign in here</a>.</p>
        </div>
    </div>
</body>

<?php
include "../Utilities/Databaseconnectivity.php";

if (isset($_POST['submit'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);

    if ($password === $confirmPassword) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Secure password hashing
        
        $db = new DataBase();
        if ($db->createConnection()) {
            $userExists = $db->verifyUserExist($username);

            if (!$userExists) {
                $result = $db->registerUser($firstName, $lastName, $username, $hashedPassword);

                if ($result) {
                    $hashedPasswordResult = password_verify($hashedPassword, $password);
                    echo "<script>alert('$hashedPasswordResult Registration  successful $hashedPassword!');</script>";
                } else {
                    echo "<script>alert('Error during registration. Try again.');</script>";
                }
            } else {
                echo "<script>alert('Username already exists. Please choose a different one.');</script>";
            }
        }
    } else {
        echo "<script>alert('Passwords do not match!');</script>";
    }
}
?>
</html>
