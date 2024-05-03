<?php 
$var = " ";
if(is_null($var)){
    echo"Variavel \$var é nula/vazia! <br>";
}
$var = "Bill Gates";
if(is_string ($var)){
    echo"Variavel \$var é string! <br>";
}
$var = 12;
if(is_integer($var)){
    echo"Variavel \$var é inteiro! <br>";
}
$var = false;
if(is_bool($var)){
    echo"Variavel \$var é booleana! <br>";
}

?>


