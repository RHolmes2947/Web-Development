<?php
include 'Supervisor.php';

include ('Header.php');
include ('Menu.php');
$employee1 = new Employee(1, 'Chris', 'Olson');
$employee2 = new Employee(2, 'Michelle', 'Holmes');
$employee3 = new Employee(3, 'Sarah', 'Smith');
$employee4 = new Employee(4, 'Jill', 'Johnson');
$employee5 = new Employee(5, 'Joe', 'Swanson');
$employee6 = new Employee(6, 'Judy', 'Williams');

$employees1 = array($employee1, $employee2, $employee3);
$employees2 = array($employee4, $employee5, $employee6);

$supervisor1 = new Supervisor(100, 'James', 'Williams', $employees1);
$supervisor2 = new Supervisor(200, 'Alex', 'Evans', $employees2);

function displayEmployees($supervisor) {
    $employees = $supervisor->getEmployees();
    foreach ($employees as $employee) {
        echo "Employee ID: " . $employee->getEmployeeId() . "<br>";
        echo "First Name: " . $employee->getFirstName() . "<br>";
        echo "Last Name: " . $employee->getLastName() . "<br>";
        echo "Supervised by: " . $supervisor->getFirstName() . " " . $supervisor->getLastName() . "<br><br>";
    }
}

displayEmployees($supervisor1);
displayEmployees($supervisor2);

include ('Footer.php');
?>

