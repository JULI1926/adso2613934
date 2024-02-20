<?php

# Linear Programing

$num1 = 54;
$num2 = 32;

echo "Result: " . ($num1 + $num2) . "<br>";
print("El Resultado es " . ($num1 + $num2) . "<br>");

echo "{$num1} * {$num2} = " . ($num1 * $num2) . "<br>";

echo "<br>Hello: " . md5('Hello') . "<br>";

$string = "Hello";
echo "MD5(\$string) = " . md5($string) . "<br>";

echo " PASSWORD_HASH($string) = " . password_hash($string, PASSWORD_DEFAULT);

$hash = password_hash($string, PASSWORD_DEFAULT);

if(password_verify($string, $hash)){
    echo "Verified Succesfull";
}

# Structured Programing
# Object oriented Programming
?>





