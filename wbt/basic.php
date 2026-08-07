<?php

echo "<h2>PHP Basic Tasks</h2>";

echo "<h3>Task 1: Rectangle Area & Perimeter</h3>";
$length = 10;
$width = 5;

$area = $length * $width;
$perimeter = 2 * ($length + $width);

echo "Area: " . $area . "<br>";
echo "Perimeter: " . $perimeter . "<br>";

echo "<hr>";

echo "<h3>Task 2: VAT Calculation (15%)</h3>";
$amount = 1000;
$vat = 0.15 * $amount;

echo "Amount: " . $amount . "<br>";
echo "VAT (15%): " . $vat . "<br>";

echo "<hr>";


echo "<h3>Task 3: Odd or Even Number</h3>";
$number = 7;

if ($number % 2 == 0) {
    echo $number . " is Even.";
} else {
    echo $number . "is Odd.";
}

echo "<br><hr>";


echo "<h3>Task 4: Largest Among Three Numbers</h3>";
$num1 = 25;
$num2 = 40;
$num3 = 15;

echo "Numbers are: $num1, $num2, $num3 <br>";
if ($num1 >= $num2 && $num1 >= $num3) {
    echo "Largest number is: " . $num1;
} else if ($num2 >= $num1 && $num2 >= $num3) {
    echo "Largest number is: " . $num2;
} else {
    echo "Largest number is: " . $num3;
}

echo "<br><hr>";


echo "<h3>Task 5: Odd Numbers Between 10 to 100</h3>";
for ($i = 10; $i <= 100; $i++) {
    if ($i % 2 != 0) {
        echo $i . " ";
    }
}

echo "<br><hr>";


echo "<h3>Task 6: Search Element from Array</h3>";
$array = [10, 25, 30, 45, 50, 60];
$search = 45;
$found = false;

for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] == $search) {
        echo "Element " . $search . " found at index " . $i . ".";
        $found = true;
        break;
    }
}

if (!$found) {
    echo "Element " . $search . " not found in the array.";
}

echo "<br><hr>";

echo "<h3>Task 7: Print Shapes</h3>";

echo "<b>Shape 1:</b><br>";
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br><b>Shape 2:</b><br>";
for ($i = 3; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}

echo "<br><b>Shape 3:</b><br>";
$char = 'A';
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $char . " ";
        $char++;
    }
    echo "<br>";
}

?>