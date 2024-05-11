
<?php
include ('Header.php');
include ('Menu.php');

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST["EmailAddress"];
    $password = $_POST["Password"];
    
  
    $servername = "localhost";
    $username = "uneshj8xssfng";
    $password = "yA178281";
    $dbname = "db62ty1apmis2k"; 
    
   
    $conn = new mysqli($servername, $username, $password, $dbname);
    
   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
   
    $sql = "SELECT * FROM Employee WHERE EmailAddress='$email' AND Password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        $_SESSION["EmployeeId"] = $row["EmployeeId"];
        $_SESSION["FirstName"] = $row["FirstName"];
        $_SESSION["LastName"] = $row["LastName"];
        $_SESSION["EmailAddress"] = $row["EmailAddress"];
        $_SESSION["TelephoneNumber"] = $row["TelephoneNumber"];
        $_SESSION["SocialInsuranceNumber"] = $row["SocialInsuranceNumber"];
        $_SESSION["Password"] = $row["Password"];
        
        
        $conn->close();
        
       
        header("Location: ViewAllEmployees.php");
        exit();
    } else {
      
        echo "Invalid credentials. Please try again.";
    }
    
    
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="EmailAddress">Email Address:</label>
        <input type="email" name="EmailAddress" required><br>

        <label for="Password">Password:</label>
        <input type="password" name="Password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php 
include ('Footer.php');
?>