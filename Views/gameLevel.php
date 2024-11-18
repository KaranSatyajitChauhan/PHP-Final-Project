<!-- game_level1.php -->
<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//     header('Location: login.php');
//     exit;
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $user_input = $_POST['user_input']; // Handle game input

//     // Randomly generate 6 letters for the game
//     $letters = range('a', 'z');
//     shuffle($letters);
//     $letters = array_slice($letters, 0, 6);
//     sort($letters);

//     // Check if user input matches
//     if ($user_input === implode('', $letters)) {
//         // Update game result as "win" in database and proceed to next level
//     } else {
//         // Show "Try again" message
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Level 1</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 500px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            padding: 12px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .game-result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        .game-result.win {
            color: green;
        }

        .game-result.lose {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Level 1: Order 6 Letters</h1>
        <form action="game_level1.php" method="post">
            <label for="user_input">Enter the letters:</label>
            <input type="text" name="user_input" id="user_input">
            <button type="submit">Submit</button>
        </form>

        <!-- Show game result -->
        <div class="game-result">
            <!-- Example of win/lose message -->
            <p class="win">You win!</p>
            <!-- <p class="lose">Game Over! Try Again.</p> -->
        </div>
    </div>
</body>
</html>
