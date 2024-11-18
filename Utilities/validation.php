<?php
require 'db.php';

if (isset($_POST['field']) && isset($_POST['value'])) {
    $field = $_POST['field'];
    $value = $_POST['value'];

    switch ($field) {
        case 'firstName':
        case 'lastName':
            if (!preg_match('/^[a-zA-Z]/', $value)) {
                echo "Must start with a letter";
            }
            break;

        case 'username':
            if (strlen($value) < 8) {
                echo "Username must be at least 8 characters long";
            } else {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                $stmt->execute([$value]);
                if ($stmt->fetch()) {
                    echo "Username already exists!";
                }
            }
            break;

        case 'password':
            if (strlen($value) < 8) {
                echo "Password must be at least 8 characters long";
            }
            break;

        case 'confirmPassword':
            if ($_POST['password'] !== $value) {
                echo "Passwords do not match!";
            }
            break;
    }
}
?>
