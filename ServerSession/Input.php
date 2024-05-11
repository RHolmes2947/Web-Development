<?php
include ('header.php');
include ('menu.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Example</title>
    <style>
        .container {
            display: flex;
        }

        .left-section {
            flex: 1;
        }

        .right-section {
            flex: 1;
        }

        .info-label {
            text-align: right;
            margin-right: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body id="results">
    <div class="container">
        <div class="left-section">
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
                    <option value="">Select a game</option>
                    <option value="Hockey">Hockey</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Soccer">Soccer</option>
                    <option value="Tennis">Tennis</option>
                </select><br><br>

                <input type="submit" value="Submit Information" name="submit">
            </form>
        </div>

        <div class="right-section">
    <h2>Results</h2>
    <p><span class="info-label">First Name:</span> <?php echo isset($_POST['submit']) ? $_POST['first_name'] : ''; ?></p>
    <p><span class="info-label">Last Name:</span> <?php echo isset($_POST['submit']) ? $_POST['last_name'] : ''; ?></p>
    <p><span class="info-label">Phone Number:</span> <?php echo isset($_POST['submit']) ? $_POST['phone_number'] : ''; ?></p>
    <p><span class="info-label">User Type:</span> <?php echo isset($_POST['submit']) ? $_POST['user_type'] : ''; ?></p>
    <p><span class="info-label">Favorite Game:</span> <?php echo isset($_POST['submit']) ? $_POST['game'] : ''; ?></p>

       
        </div>
    </div>
</body>
</html>

<?php 
include ('footer.php');
?>
