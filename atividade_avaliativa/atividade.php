<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>array_keys</h1>
  <h2>Retorna todas as chaves ou parte  das chaves de um array</h2>
<pre>
<?php
$var=array(4 => 17, "cor"=>'red'
);
print_r(array_keys($var));

$var=array("boneca", "carrinho","urso","livro");
print_r(array_keys($var,"boneca"));

$var=array("cor" => array("blue", "yellow","pink"),
          "tamanho" => array("pequeno","medio","grande"));
print_r(array_keys($var));
?>
</pre>

<h1>array_values</h1>
<h2> serve para obter todos os valores de um array</h2>
<pre>
<?php
$milly=array("idade"=> 17, "ano"=> 2006,);
print_r(array_values($milly));
?>
</pre>

<h1>array_search</h1>
<h2>serve para encontra o valor de uma array e retornar sua chave correspondente</h2>
<pre>
<?php
$nome=array("0"=> 'ana', "1"=> 'marcos', "2"=> 'milly', "3"=> 'andreia',);
print_r (array_search('milly', $nome));
echo "<br>";
print_r (array_search('andreia', $nome));
echo "<br>";
?>
</pre>

<h1>array_key_exists</h1>
  <h2>serve para  verificar se uma chave existe em um array</h2>
<pre>
<?php
$aluno=array("anderson"=>12, "ana"=> 15,"andreia"=> 13,
);
if (array_key_exists("anderson", $aluno)) {
    echo "O elemento 'anderson' esta no array";
}
?>
</pre>

<h1>in_array</h1>
<h2>verifica se um valor exite em uma array</h2>
<pre>
<?php
$var=array("Frutas","Verduras","Doce","Proteinas");
if(in_array("Frutas", $var)){
  echo "tem Frutas";
  echo "<br>";
}

//A segunda condicional falha pois in_array() diferencia letras minusculas e maiusculas.
if(in_array("doce", $var)){
  echo "tem doce";
  echo "<br>";
}
?>
</pre>

<h1>issent</h1>
<h2>Determina se uma variavel esta declarada</h2>
<pre>
<?php
$frutas = array("a" => "maca","b" => "banana","c" => "cereja"
);
$chave = "b";
if (isset($frutas[$chave])) {
    echo "A chave '$chave' esta definida no array e o valor e: " . $frutas[$chave];
    echo "<br>";
} else {
    echo "A chave '$chave' nao esta definida no array.";
    echo "<br>";
}
if (isset($frutas['d'])) {
    echo "A chave 'd' esta definida no array e o valor e: " . $frutas['d'];
    echo "<br>";
} else {
    echo "A chave 'd' nao esta definida no array";
}
?>
</pre>

<h1>unset</h1>
<h2>Remove a definicao de uma variavel informada</h2>
<pre>
<?php
function destroy_foo()
{
    global $foo;
    unset($foo);
}

$foo = 'maca';
destroy_foo();
echo $foo;
?>
</pre>

<h1>empty</h1>
<h2> Determina se uma variavel esta vazia</h2>
<pre>
<?php
$var= 0;
if(empty($var)){
  echo '$var e 0, vazia ou nao definida';
  echo "<br>";
}
if (isset($var)) {
    echo '$var esta definida embora esteja vazia';
    echo "<br>";
}
?>
</pre>

<h1>array_push</h1>
<h2>adicionar um ou mais elementos ao final de um array</h2>
<pre>
  <?php
  $var= array("diego", "nicolas");
  array_push($var ,"maria", "ana");
  print_r($var);
  ?>
</pre>

<h1>array_pop</h1>
<h2>remove o ultimo elemento de um array</h2>
<pre>
<?php
$var=array("maria", "joao", "carla", "andreia");
$nome = array_pop($var);
print_r($var);
?>
</pre>

<h1> array_shift</h1>
<h2>remove o primeiro elemento de um array</h2>
<pre>
  <?php
  $var=array("maria", "joao", "carla", "andreia");
  $nome = array_shift($var);
  print_r($var);
  ?>
</pre>

<h1> array_unshift</h1>
<h2>adiciona um ou mais elementos no inicio de um array</h2>
<pre>
<?php
$var=array("maria", "joao");
array_unshift($var, "carla", "andreia");
print_r($var);
?>
</pre>

<h1>count</h1>
<h2>conta um numero de um elemento em um array </h2>
<pre>
<?php
$a[0] =1;
$a[1] =3;
$a[2] =8;
print_r(count($a));
echo"<br>";

$b[0] =8;
$b[1] =6;
$b[2] =2;
print_r(count($b));
echo"<br>";
?>
</pre>

<h1>explode</h1>
<h2>divide uma string em um array</h2>
<pre>
  <?php
  $input1 = "ola";
  $input2 = "ola , todos";
  $input3 = ',';
  var_dump( explode( ',', $input1 ) );
  var_dump( explode( ',', $input2 ) );
  var_dump( explode( ',', $input3 ) );
  
  ?>
</pre>

<h1>implode</h1>
<h2>junta os elementos de um array em uma string</h2>
<pre>
<?php
$a1=array("1","3","2");
$a2=array("j");
$a3=array();

echo "a1 e: '".implode("','",$a1)."'<br>";
echo "a2 e: '".implode("','",$a2). "'<br>";
echo "a3 e: '".implode("','",$a3)."'<br>";
?>
</pre>

<h1>array_combine</h1>
<h2>cria um array combinado um array de chave com outros valores</h2>
<pre>
<?php
$a = array('amarelo', 'verde', 'vermelho');
$b = array('laranja', 'limao', 'morango');
$c = array_combine($a, $b);
print_r($c);
?>
</pre>

<h1>array_diff</h1>
<h2>cacula a diferenca entre array</h2>
<pre>
<?php
$a1 = array("a" => "verde", "amarelo", "vermelho", "rosa");
$a2 = array("b" => "verde", "amarelo", "vermelho");
$var = array_diff($a1, $a2);
print_r($var);
?>
</pre>

<h1>array_intersect</h1>
<h2>cacula a interacao entre array</h2>
<pre>
<?php
$a1 = array("a" => "verde", "vermelho", "azul");
$a2 = array("b" => "verde", "amarelo", "vermelho");
$var = array_intersect($a1, $a2);
print_r($var);
?>
</pre>
