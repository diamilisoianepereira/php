<?php 
//Criar as constantes com as credencias de acesso ao banco de dados

  //   modificar para usar o seu banco de dados em sua maquina //


define('HOST', 'localhost');   //endereço do BD
define('USUARIO', 'root');    // seu usuario do mysql
define('SENHA', '');    //sua senha do banco mysql
define('DBNAME', 'sisdoacoes');  //nome do seu database

//Criar a conexão com banco de dados usando o PDO e a porta do banco de dados
//Utilizar o Try/Catch para verificar a conexão.

/////////   não modificar codigo abaixo  //////////
try {

    $conn = new pdo('mysql:host=' . HOST . ';dbname=' .
                                     DBNAME, USUARIO, SENHA);
} catch (PDOException $e) {
    echo "Erro: Conexão com banco de dados não foi realizada com sucesso.
     Erro gerado " . $e->getMessage();
}


?>