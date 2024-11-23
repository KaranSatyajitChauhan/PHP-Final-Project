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
    <link rel="stylesheet" href="../Styles/gameLevel.css">
    <link rel="stylesheet" href="../Styles/common.css">

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
