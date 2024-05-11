
<?php

include ('Header.php');
include ('Menu.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $firstName = $_POST["FirstName"];
    $lastName = $_POST["LastName"];
    $email = $_POST["EmailAddress"];
    $telephoneNumber = $_POST["TelephoneNumber"];
    $sin = $_POST["SocialInsuranceNumber"];
    $password = $_POST["Password"];
    
 
    $_SESSION["FirstName"] = $firstName;
    $_SESSION["LastName"] = $lastName;
    $_SESSION["EmailAddress"] = $email;
    $_SESSION["TelephoneNumber"] = $telephoneNumber;
    $_SESSION["SocialInsuranceNumber"] = $sin;
    $_SESSION["Password"] = $password;
    
   
    $servername = "localhost"; 
    $username = "uneshj8xssfng"; 
    $password = "yA178281";  
    $dbname = "db62ty1apmis2k";  
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    
    $sql = "INSERT INTO Employee (FirstName, LastName, EmailAddress, TelephoneNumber, SocialInsuranceNumber, Password)
            VALUES ('$firstName', '$lastName', '$email', '$telephoneNumber', '$sin', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
    $conn->close();
    
   
    header("Location: ViewAllEmployees.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Employee Account</title>
</head>
<body>
    <h2>Create Employee Account</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="FirstName">First Name:</label>
        <input type="text" name="FirstName" required><br>

        <label for="LastName">Last Name:</label>
        <input type="text" name="LastName" required><br>

        <label for="EmailAddress">Email Address:</label>
        <input type="email" name="EmailAddress" required><br>

        <label for="TelephoneNumber">Telephone Number:</label>
        <input type="text" name="TelephoneNumber" required><br>

        <label for="SocialInsuranceNumber">Social Insurance Number:</label>
        <input type="text" name="SocialInsuranceNumber" required><br>

        <label for="Password">Password:</label>
        <input type="password" name="Password" required><br>

        <input type="submit" value="Create Account">
    </form>
</body>
</html>


<?php 
include ('Footer.php');
?>