<?php
include ('Header.php');
include ('Menu.php');

$noKeyArray = array(
    10,
    20,
    30,
    40,
    50
);

echo "<h3 style='color:blue; font-family:verdana;'>No Key Array - output using var_Dump</h3><br>";



var_dump($noKeyArray);
echo "<br><br>";

echo "<h3 style='color:blue; font-family:verdana;'>No key Array - output using foreach</h3><br>";

foreach ($noKeyArray as $key => $value) {
    echo "Key: ", $key, " ";
    echo "Value: ", $value, " ";
    echo "Key type: ", gettype($key), "<br>";
}
echo "<br>";

$stringKeyArray = array(
    "K1" => "Monday",
    "K2" => "Tuesday",
    "K3" => "Wednsday"
);

echo "<h3 style='color:blue; font-family:verdana;'>String Key Array - Output Using var_Dump</h3><br>";


var_dump($stringKeyArray);
echo "<br><br>";

echo "<h3 style='color:blue; font-family:verdana;'>String Key Array - Output Using foreach</h3><br>";


foreach ($stringKeyArray as $key => $value) {
    echo "Key: ", $key, " ";
    echo "Key type: ", gettype($key), " ";
    echo "Value: ", $value, "<br>";
}

$intKeyArray = array(
    1 => "Monday",
    2 => "Tuesdday",
    3 => "Wednsday"
);

echo "<h3 style='color:blue; font-family:verdana;'>Integer Key Array - output using var_Dump</h3><br>";

var_dump($intKeyArray);
echo "<br><br>";

echo "<h3 style='color:blue; font-family:verdana;'>Integer Key Array - output using foreach</h3><br>";
foreach ($intKeyArray as $key => $value) {
    echo "Key: ", $key, " ";
    echo "Key type: ", gettype($key), " ";
    echo "Value: ", $value, "<br>";
}

$mixedKeyArray = array(
    "firstKey" => "First Value",
    2 => "Second Value",
    "thirdKey" => "Third Value",
    4 => "Fourth Value"
);
echo "<br>";
echo "<h3 style='color:blue; font-family:verdana;'>Mixed key Array - output using varp_Dump</h3><br>";

var_dump($mixedKeyArray);
echo "<br><br>";

echo "<h3 style='color:blue; font-family:verdana;'>Mixed key Array - output using foreach</h3><br>";
foreach ($mixedKeyArray as $key => $value) {
    echo "Key: ", $key, " ";
    echo "Key type: ", gettype($key), " ";
    echo "Value: ", $value, "<br>";
}


$multiDimensionArray = array(
    "firstArray" => array("one", "two", "three"),
    "secondArray" => array("four", "five", "six"),
    "thirdArray" => array("seven", "eight", "nine")
);

echo "<h3 style='color:blue; font-family:verdana;'>Multi-Dimensional Array - output using Var_Dump</h3><br>";
var_dump($multiDimensionArray);
echo "<br><br>";

echo "<h3 style='color:blue; font-family:verdana;'>NMulti-Dimensional Array - output using foreach</h3><br>";
foreach($multiDimensionArray as $key => $value) {
    echo "Key: ", $key, " ";
    echo "Key type: ", gettype($key), " ";
    echo "Value: ";
    foreach($value as $subkey => $subvalue) {
        echo "    SubKey: ", $subkey, " ";
        echo "    SubKey type: ", gettype($subkey), " ";
        echo "    SubValue: ", $subvalue, "<br>";
    }
}


include ('Footer.php');