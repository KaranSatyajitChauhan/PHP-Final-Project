<?php
// Start the session at the very beginning of the file
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please do the login first');</script>";
    header("Location: login.php");
    exit;  // Always call exit after header redirection to prevent further execution
}

// Get user data if they are logged in
$data = $_SESSION['userData'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Level 1</title>
    <link rel="stylesheet" href="../Styles/gameLevel.css">
</head>
<body>
  <!-- Dark Navigation Bar -->
  <div class="navbar">
        <div class="navbar-container">
            <a href="#" class="logo">Quize Game</a>
            <div class="navbar-links">
                <a href="#">Home</a>
                <a href="#">Level 1</a>
                <a href="#">Level 2</a>
                <a href="#">Leaderboard</a>
                <a href="#" onclick="window.location.href='../Utilities/logout.php'">Logout</a>
            </div>
        </div>
    </div>

<form method="post" action="submit.php">
    <div class="question-set">
        <?php
        // Read the JSON file and decode it into an associative array
        $json_data = file_get_contents('../Resources/questions.json');  // Adjust the path to your file
        $data = json_decode($json_data, true);  // Decode the JSON data

        // Check if decoding was successful
        if ($data === null) {
            die('Error decoding JSON.');
        }

        $questions = $data['questions'];  // Access the 'questions' array

        // Set the group size (adjustable to 2, 4, 6, or 8)
        $group_size = 4;  // Example: change this to 2, 6, or 8 for different group sizes

        // Split questions into groups of $group_size
        $grouped_questions = array_chunk($questions, $group_size);

        // Loop through each group
        foreach ($grouped_questions as $index => $group) {
            echo "<div class='group'>";
            echo "<h3>Group " . ($index + 1) . "</h3>";
            
            // Loop through each question in the group
            foreach ($group as $i => $question) {
                echo "<div class='question'>";
                echo "<p>" . ($index * $group_size + $i + 1) . ". " . htmlspecialchars($question['question']) . "</p>";
                
                // Loop through the options and display them as radio buttons
                foreach ($question['options'] as $option) {
                    echo "<label>";
                    echo "<input type='radio' name='question" . ($index * $group_size + $i + 1) . "' value='" . htmlspecialchars($option) . "'>";
                    echo htmlspecialchars($option);
                    echo "</label><br>";
                }
                echo "</div>";  // Close question div
            }
            echo "</div>";  // Close group div
        }
        ?>
    </div>
    <button type="submit">Submit</button>
</form>

<!-- Show game result -->
<div class="game-result">
    <!-- Example of win/lose message -->
    <p class="win">You win!</p>
    <!-- <p class="lose">Game Over! Try Again.</p> -->
</div>

</body>
</html>
