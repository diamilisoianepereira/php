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
$professor = array( "nome" => "fabio", 
"idade" => 44, 
"end" => "xxxxxxxxx", 
"cidade"=> "Guanambi",
"estado"=> "BA", 
"cpf"=> "678.095.298-54");

echo "<p> professor </p>" ;
echo $professor["nome"] ."<br>";
echo $professor["idade"] ."<br>";
echo $professor["end"] . "<br>";
echo $professor["cidade"] . "<br>";
echo $professor["estado"] . "<br>";
echo $professor["cpf"] . "<br>";

echo "<br>";

$aluno1= array( "nome" => "diamili", 
"idade" => 17, 
"end" => "xxxxxxxxx", 
"cidade"=> "palmas de monte alto",
"estado"=> "BA", 
"cpf"=> "789.095.234-87");

echo "<p> Aluno 1 </p>" ;

echo $aluno1["nome"] ."<br>";
echo $aluno1["idade"] ."<br>";
echo $aluno1["end"] . "<br>";
echo $aluno1["cidade"] . "<br>";
echo $aluno1["estado"] . "<br>";
echo $aluno1["cpf"] . "<br>";

echo "<br>";


$aluno2 = array( "nome" => "estepanhe", 
"idade" => 17, 
"end" => "xxxxxxxxxx", 
"cidade"=> "palmas de monte alto",
"estado"=> "BA", 
"cpf"=> "675.987.065-65");

echo "<p> Aluno 2 </p>" ;

echo $aluno2["nome"] ."<br>";
echo $aluno2["idade"] ."<br>";
echo $aluno2["end"] . "<br>";
echo $aluno2["cidade"] . "<br>";
echo $aluno2["estado"] . "<br>";
echo $aluno2["cpf"] . "<br>";

echo "<br>";


$aluna = array( "nome" => "andreia", 
"idade" => 46, 
"end" => "xxxxxxxxxx", 
"cidade"=> "palmas de monte alto",
"estado"=> "BA", 
"cpf"=> "987.098.654-09");

echo "<p> aluna 3 </p>" ;

echo $aluna["nome"] ."<br>";
echo $aluna["idade"] ."<br>";
echo $aluna["end"] . "<br>";
echo $aluna["cidade"] . "<br>";
echo $aluna["estado"] . "<br>";
echo $aluna["cpf"] . "<br>";

?>
</body>
</html>