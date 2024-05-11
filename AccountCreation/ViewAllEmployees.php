<?php
class ViewAllEmployees
{
    public function __construct()
    {
        // Start the session
        session_start();

        // Check if the employee is logged in
        if (!$this->isLoggedIn()) {
            // Redirect to the login page if not logged in
            header("Location: Login.php");
            exit();
        }
    }

    private function isLoggedIn()
    {
        // Check if the necessary session variables are set to validate login
        return isset($_SESSION["EmployeeId"]) && isset($_SESSION["FirstName"]) && isset($_SESSION["LastName"]);
    }

    private function getDatabaseConnection()
    {
        // Define database connection settings
        $servername = "localhost";
        $username = "uneshj8xssfng";
        $password = "yA178281";
        $dbname = "db62ty1apmis2k";

        // Create a new database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function displayEmployeeData()
    {
        // Display the HTML header
        echo "<!DOCTYPE html>";
        echo "<html>";
        echo "<head>";
        echo "<title>View All Employees</title>";
        echo "</head>";
        echo "<body>";

        // Display session state data
        echo "<h1>Session State Data</h1>";
        echo "<p><strong>Employee ID:</strong> " . $_SESSION["EmployeeId"] . "</p>";
        echo "<p><strong>First Name:</strong> " . $_SESSION["FirstName"] . "</p>";
        echo "<p><strong>Last Name:</strong> " . $_SESSION["LastName"] . "</p>";
        // Add any other session state data you want to display here

        // Display database data
        echo "<h1>Database Data</h1>";
        $conn = $this->getDatabaseConnection();

        // Fetch all rows from the Employee table
        $sql = "SELECT * FROM Employee";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display HTML table with header row
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Employee ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email Address</th>";
            echo "<th>Telephone Number</th>";
            echo "<th>Social Insurance Number</th>";
            echo "</tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["EmployeeId"] . "</td>";
                echo "<td>" . $row["FirstName"] . "</td>";
                echo "<td>" . $row["LastName"] . "</td>";
                echo "<td>" . $row["EmailAddress"] . "</td>";
                echo "<td>" . $row["TelephoneNumber"] . "</td>";
                echo "<td>" . $row["SocialInsuranceNumber"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found in the database.";
        }

        // Close the database connection
        $conn->close();

        // Display HTML footer
        echo "</body>";
        echo "</html>";
    }
}

// Instantiate the class to display the data
$viewAllEmployees = new ViewAllEmployees();
$viewAllEmployees->displayEmployeeData();
?>
