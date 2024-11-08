<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 80%;
            padding: 10px;
            margin-left: 4px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #5cb85c;
            color: white;
            font-size: 16px;
        }

        button:hover {
            background-color: #4cae4c;
        }

        .error {
            color: red;
            font-size: 12px;
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        .link a {
            color: #007bff;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Create an Account</h1>
    <form action="process_registration.php" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" onkeyup="validateField(this)">
        <span id="firstNameError" class="error"></span>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" onkeyup="validateField(this)">
        <span id="lastNameError" class="error"></span>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" onkeyup="validateField(this)">
        <span id="usernameError" class="error"></span>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" onkeyup="validateField(this)">
        <span id="passwordError" class="error"></span>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" name="confirmPassword" id="confirmPassword" onkeyup="validateField(this)">
        <span id="confirmPasswordError" class="error"></span>

        <button type="submit">Register</button>
        
    </form>

    <div class="link">
        <p>Already have an account? <a href="login.php">Sign in here</a>.</p>
    </div>
</body>
</html>