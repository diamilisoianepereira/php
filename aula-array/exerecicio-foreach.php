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
echo "<p> Aluno 1 </p>";
$aluno1= array( "diamili", 17, "xxxxxxxxx", "palmas de monte alto", "BA", "789.095.234-87");

foreach($aluno1 as $dado) {
    echo"$dado<br>";
}

echo "<p> Aluno 2 </p>" ;
$aluno2 = array(  "estepanhe", 17, "xxxxxxxxxx", "palmas de monte alto", "BA",  "675.987.065-65");

foreach($aluno2 as $dado) {
    echo"$dado<br>";
}

echo "<p> Aluno 3 </p>";
$aluno3 = array( "andreia", 46, "xxxxxxxxxx", "palmas de monte alto", "BA", "987.098.654-09");

foreach($aluno3 as $dado) {
    echo"$dado<br>";
}
?>
</body>
</html>