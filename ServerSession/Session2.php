<?php
include ('header.php');
include ('menu.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
       <title>Results</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet.css">
</head>
<body id="results">
    <h2>Results</h2>
    <?php
    if (isset($_SESSION['first_name'])) {
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $phone_number = $_SESSION['phone_number'];
        $user_type = $_SESSION['user_type'];
        $game = $_SESSION['game'];

        echo "<p><strong>First Name:</strong> $first_name</p>";
        echo "<p><strong>Last Name:</strong> $last_name</p>";
        echo "<p><strong>Phone Number:</strong> $phone_number</p>";
        echo "<p><strong>User Type:</strong> $user_type</p>";
        echo "<p><strong>Favorite Game:</strong> $game</p>";
    } else {
        echo "<p>No information available.</p>";
    }
    ?>
</body>
</html>
<?php 
include ('footer.php');
?>