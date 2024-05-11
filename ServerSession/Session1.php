<?php
session_start();
include ('header.php');
include ('menu.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['first_name'] = $_POST['first_name'];
    $_SESSION['last_name'] = $_POST['last_name'];
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $_SESSION['user_type'] = $_POST['user_type'];
    $_SESSION['game'] = $_POST['game'];

  
    header('Location: Session2.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
</head>
<body id="results">
    <h2>Form</h2>
    <form method="post" action="">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required><br><br>

        <label for="user_type">User Type:</label><br>
        <input type="radio" id="staff" name="user_type" value="Staff" required>
        <label for="staff">Staff</label><br>
        <input type="radio" id="student" name="user_type" value="Student" required>
        <label for="student">Student</label><br>
        <input type="radio" id="faculty" name="user_type" value="Faculty" required>
        <label for="faculty">Faculty</label><br><br>

        <label for="game">Favorite Game:</label>
        <select id="game" name="game" required>
            <option value="Hockey">Hockey</option>
            <option value="Basketball">Basketball</option>
            <option value="Soccer">Soccer</option>
            <option value="Tennis">Tennis</option>
        </select><br><br>

        <input type="submit" value="Submit Information" name="submit">
    </form>
</body>
</html>

<?php 
include ('footer.php');
?>
