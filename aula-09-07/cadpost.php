
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>exemplo-post</title>

</head>
<body>
 <form action="listaprod.php" method="get">
 <p> produto: <input type="text" name="produto"/> </p>
<p>marca:
 <select name="marca" id="marca">
 <option value=""></option>
 <option value="gucci">gucci</option>
 <option value="adidas">adidas</option>
 <option value="zaba">zaba</option>
 <option value="lacost">lacost</option>
 </select></p>
 tamanho: 
 <select name="tamanho" id="tamanho">
 <option value=""></option>
 <option value="PP">PP</option>
 <option value="P">P</option>
 <option value="M">M</option>
 <option value="GG">GG</option>
 <option value="2G">2G</option>
 <option value="3G">3G</option>
 <option value="4G">4G</option>
 <option value="5G">5G</option>
 </select>
 <p> preco: <input type="text" name="preco"/> </p>
 cor: 
 <select name="cor" id="cor">
 <option value=""></option>
 <option value="cinza">cinza</option>
 <option value="preta">preta</option>
 <option value="marrom">marrom</option>
 <option value="rosa">rosa</option>
 <option value="verde">verde</option>
 </select>
 <p> modelo: <input type="text" name="modelo" /> </p>
genero: 
 <select name="genero" id="genero">
 <option value=""></option>
 <option value="masculino">masculino</option>
 <option value="feminino">feminio</option>
 </select>
 <p> DTcompra: <input type="text" name="DTcompra" /> </p>
 <input TYPE="hidden" NAME="form_submit" VALUE="OK"> 
 <button>enviar</button>
</body>