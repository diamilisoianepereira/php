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

echo "<p> Aluno 1 </p>" ;
$var= array("diamili", 17, "xxxxxxxxx", "palmas de monte alto","BA", "789.095.234-87");

for($a=0; $a<count($var); $a++){
    echo "$var[$a] <br>";
}

echo "<p> Aluno 2 </p>" ;
$var= array(  "estepanhe", 17,  "xxxxxxxxxx",  "palmas de monte alto", "BA", "675.987.065-65");

for($a=0; $a<count($var); $a++){
    echo "$var[$a] <br>";
}


echo "<p> aluno 3 </p>" ;
$var = array( "andreia", 46, "xxxxxxxxxx", "palmas de monte alto", "BA", "987.098.654-09");

for($a=0; $a<count($var); $a++){
    echo "$var[$a] <br>";
}
?>
</body>
</html>