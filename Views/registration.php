<!-- register.php -->
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
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Create an Account</h1>
        <form action="register_process.php" method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" name="firstName" id="firstName" onkeyup="validateField(this)">
                <span id="firstNameError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" name="lastName" id="lastName" onkeyup="validateField(this)">
                <span id="lastNameError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" onkeyup="validateField(this)">
                <span id="usernameError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" onkeyup="validateField(this)">
                <span id="passwordError" class="error"></span>
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" onkeyup="validateField(this)">
                <span id="confirmPasswordError" class="error"></span>
            </div>

            <button type="submit">Register</button>
        </form>

        <div class="link">
            <p>Already have an account? <a href="login.php">Sign in here</a>.</p>
        </div>
    </div>
</body>
</html>
