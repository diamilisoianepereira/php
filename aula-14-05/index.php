<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>array-lacos</h1>
  <h2>impressao 1 por 1</h2> 
  <pre>
    <?php
    $A1=array("antonio","luiz","jose","joao");
    echo "<br>-$A1[0]<br>";
    echo "-$A1[1]<br>";
    echo "-$A1[2]<br>";
    echo "-$A1[3]<br>";
    ?>
   </pre>
 
<h2>ARRAY COM FOR</h2>
<pre>
<?php
   $A2=array(10,9,8,7);
 for($x=0; $x<(4); $x++) {
    echo "-posicao $x o valor e $A1[$x]<br>";
   
 }
?> 
</pre>

<h2> IMPRESSAO COM [FOREACH];</h2>
<pre>
<?php
   $A1=array(10,9,8,7);
 foreach($A1 as $key => $valores) {
    echo "$key : javon: $valores<br>";
 }
?> 
</pre>

<h2>DEFINICAO EXPLICIDA (COM CHAVE)</h2>
<?php
$var=array("javon"=> 25,
            "mainha"=> 44,
            "painho"=> 12,
            "daelo"=> 73
);
foreach($var as  $dados) {
        echo "$dados<br>";
}
 ?> 

 <h2>FOREACH COM CHAVE E O VALOR<h/2>
 <pre>
 <?php
$var=array("javon"=> 17,
            "mainha"=> 46,
            "painho"=> 45,
            "daelo"=> 12
);
foreach($var as $chave => $valor) {
    echo "$chave: tem  $valor anos <br>";
}
?>
</pre>

<h2>PLINT_R MOSTRA O QUE TEM ARAMAZENDADO NO ARRAY</h2>
<pre>
<?php
  print_r($var);
  ?>
</pre>

<h2>ARRAY MULTIDIMENSIONAL: DEFINICAO EXPLICIDA</h2>
<pre>
<?php
$aluno= array("javon" =>
                    array("cidade" => "atlanta",
                           "pais"=> "estados unidos"),
                "andreia"=>
                        array("cidade"=> "palmas de monta alto",
                               "pais"=> "brasil"),
                "leca"=>
                        array("cidade"=>"palmas de monta alto",
                               "pais"=> "brasil"),
                "daelo"=>
                        array("cidade"=>"atlant",
                              "pais"=>"estados unidos")
);
print_r($aluno);
?>
</pre>

<h2>ARRAY MULTIDIMENSIONAL: PLINTAR SO MARIA</h2>
<pre>
<?php
$aluno= array("maria" =>
                    array("cidade" => "atlanta",
                           "pais"=> "estados unidos"),
                "andreia"=>
                        array("cidade"=> "palmas de monta alto",
                               "pais"=> "brasil"),
                "liz"=>
                        array("cidade"=>"guanambi",
                               "pais"=> "brasil"),
                "diamili"=>
                        array("cidade"=>"palmas de monte alto",
                              "pais"=>"brasil")
);
print_r($aluno ["maria"]);
?>
</pre>

<h2>ARRAY MULTIDIMENSIONAL: PLINTAR SO A CIDADE DE MARIA</h2>
<pre>
<?php
print_r($aluno ["maria"] ["cidade"]);
?>
</pre>

<h2>ARRAY MULTIDIMENSIONAL: PLINTAR  O PAIS DE ANDREIA</h2>
<pre>
<?php
print_r($aluno ["andreia"] ["pais"]);
?>
</pre>

<h2>ARRAY MULTIDIMENSIONAL: PLINTAR  O PAIS DE  LIZ</h2>
<pre>
<?php
print_r($aluno ["liz"] ["pais"]);
?>
</pre>

<h2>ARRAY MULTIDIMENSIONAL: PLINTAR  A CIDADE E PAIS DE DIAMILI</h2>
<pre>
<?php
print_r($aluno ["diamili"] ["cidade"]);
echo "<br>";
Print_r($aluno ["diamili"] ["pais"]);
echo "<br>";
?>
</pre>

<h2>IMPRESSAO COM FOREACH-ARRAY DENTRO DO ARRAY </h2>
<pre>
<?php
foreach($aluno as $chave => $aux){
    echo "<br>nome $chave <br>";
    foreach ($aux as $chave => $valor) {
        echo " $chave - $valor<br>";
    }
    echo"<br>";
}
?>
</pre>
</body>
</html>


