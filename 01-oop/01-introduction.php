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

function adition($num1, $num2) {
    return($num1 + $num2) ; // Add a semicolon here
}

echo "<br>";

$res = adition(34, 890) ;
echo $res;

# Structured Programing
# Object oriented Programming

class Adition {
    public $num1;
    public $num2;

    public function getResult(){
        return($this->num1 + $this->num2);
    }

}

$sum = new Adition;
$sum->num1 = 1024;
$sum->num2 = 512;

echo "<br>La Suma de {$sum->num1} y {$sum->num2} es = ". $sum->getResult();

?>





