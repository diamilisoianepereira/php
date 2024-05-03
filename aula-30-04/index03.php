<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
echo"<p>Exemplo 1</p> <br>";
$var = array(1,2,4,5);
echo"$var[0] <br>";
echo"$var[1] <br>";
echo"$var[2] <br>";
echo"$var[3] <br>";
echo "<br>";

echo"<p>Exemplo 2</p> <br>";
$var2 = array("Fabio"=>30, "Eber"=>40, "WQ"=>60);
foreach ($var2 as $key2 => $value2) {
    echo "$key2: "; 
    echo "$value2 <br>";
}
echo "<br>";

echo"<p>Exemplo 3</p> <br>";
$var3 = array(0=>5, 6=>8, 9=>15);
foreach ($var3 as $key3 => $value3) {
    echo "$key3: "; 
    echo "$value3 <br> ";
}
echo "<br>";

echo"<p>Exemplo 4</p> <br>";
$var4 = array(0=>5, 6=>8, 9=>15);
echo"$var4[6] <br>";
$var4[0] = 4;
echo"$var4[0] <br>";
echo"$var4[9] <br>";
$var4[1] = 20;
echo"$var4[1]";
?>
</body>
</html>


