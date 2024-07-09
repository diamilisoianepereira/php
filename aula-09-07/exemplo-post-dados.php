<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
echo "<div style='background-color:red'>";
 echo "formulario - post dados";
echo "</div>";
 function obterDados($post) {
 $dados = $post['cpf']." - ".$post['nome'];
 echo "<script> alert('".$dados."') </script>";
 }
?>
</body>
</html>
