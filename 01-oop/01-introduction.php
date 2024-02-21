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


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
<form method="POST">
        <label for="nombre">Número1:</label>
        <input type="range" id="" name="num1" step= "1" value = "0" onininput = "o1.value=this.value" required>
        <output id="o1">0</output>
        <br>
        <label for="correo">Número 2:</label>
        <input type="range" id="" name="num2" step = "2" value = "0" onininput = "o2.value=this.value" required>
        <output id="o1">0</output>
        <br>
        <input type="submit" value="Sumar">
</form>    



<?php
    if (isset($_POST["num1"]) && isset($_POST["num2"]) ){
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $sum = new Adition;
        $sum->num1 = $num1;
        $sum->num2 = $num2;
        echo "<br>La Suma de {$sum->num1} y {$sum->num2} es = ". $sum->getResult(). "<br>";

    }
    else {
        echo "<script>alert('Campo Vacío. Favor Rellenar');</script>";
    }
?>
</body>
</html>



