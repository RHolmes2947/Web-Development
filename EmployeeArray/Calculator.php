<?php

include ('Header.php');
include ('Menu.php');
?>

<!DOCTYPE html>
<html>
<body>
<form method="post" action="calculator.php">
<input type="number" name="num1" required>
<select name="operator">
<option value="add">+</option>
<option value="sub">-</option>
<option value="mul">×</option>
<option value="div">/</option>
<option value="exp">exp</option>
</select>
<input type="number" name="num2" required>
<input type="submit" value="=" name="submit">
</form>
</body>
</html>

<?php



function isPrime($num) {
    if ($num <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];
    $result = 0;
    
    switch ($operator) {
        case 'add':
            $result = $num1 + $num2;
            break;
        case 'sub':
            $result = $num1 - $num2;
            break;
        case 'mul':
            $result = $num1 * $num2;
            break;
        case 'div':
            $result = $num1 / $num2;
            break;
        case 'exp':
            $result = pow($num1, $num2);
            break;
    }
    
    $evenOdd = $result % 2 == 0 ? 'Even' : 'Odd';
    $prime = isPrime($result) ? 'Prime' : 'Not Prime';
    
    echo "Result: " . $result . "<br>";
    echo "The Result is an " . $evenOdd . " number.<br>";
    echo "The Result is " . $prime . ".";
}





 include ('Footer.php');
?>










