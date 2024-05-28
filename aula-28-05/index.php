<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>exercicio 01</h1>
    <pre>
        <?php 
        define("PI", 2024);
       echo PI; ?> 
    </pre>

     <h1>exercicio 02</h1>
     <pre>
     <?php 
     function FuncConsts() {
        echo "ARQUIVO: ".__FILE__."<br>";
        echo "DIRETORIO: ".__DIR__."<br>";
        echo "LINHA: ".__LINE__."<br>";
        echo "FUNCAO: ".__FUNCTION__."<br>";
       } 
        FuncConsts();
       ?>
    </pre>

    <h1>exercicio 03</h1>
    <pre>
        <?php
        class veiculo{
            private $marca;
            function __construct() {
            echo "CLASSE: ".__CLASS__."<br>";
        }
       
        function setMarca($marca) { $this->marca = $marca;
            echo "METODO: ".__METHOD__."<br>"; 
           } }

        $obj = new veiculo(); 
        $obj->setMarca("Wolksvagem");
        ?>
      </pre>
     
      <h1>exercicio 04</h1>
      <pre>
        <?php
        $vars_pre = get_defined_vars();
        print_r($vars_pre);
        ?>
      </pre>

      <h1>exercicio 05</h1>
      <?php
     function nome_funcao($par_1 = 10, $par_2 = 20) {
     echo "Codigo da Funcao <br>";
    return "Dado de Retorno: ".$par_1."/".$par_2;
 }
 $retorno = nome_funcao();
 echo $retorno."<br><br>";
 $retorno = nome_funcao(12, "Bill Gates");
 echo $retorno."<br><br>";
?>

<pre>
<?php
function funcao_soma(){
$par_1 =10;
$par_2 = 20;
$soma= $par_1 + $par_2;
echo "valor da soma e $soma";
}
funcao_soma();
echo "<br>";
?>
 
<?php
function soma_com_parametro($par_1,$par_2)
{
 $par_3=$par_1+ $par_2;
 echo " A soma é igual $par_3";
}
soma_com_parametro(10,20);
echo"<br>";
?>

<?php
 function funcao_multiplicao($par_1,$par_2, $par_3)
 {
    $a= $par_1 + $par_2 + $par_3;
    echo " resultado da funcao  $a ";
 }
 funcao_multiplicao(20,10,22);
?>
</pre>

<pre>
    <?php
    function funcao_exemplo($par_1,$par_2)
    {
        $soma = $par_1+$par_2;
        $mult = $soma*$par_2;
        $div = $mult/$par_2;
        $sub = $div-$par_2;
        return $sub;
    }
    echo funcao_exemplo(40,20);
?>

<h1>funcao  E2</h1>
<pre>
    <?php
  function   funcao_E2($pre_1)
  {
    $soma=$pre_1+$pre_1;
    return $soma;
   
  }
 echo funcao_E2(funcao_E2(40,40));

  ?>
</pre>
</body>
</html>