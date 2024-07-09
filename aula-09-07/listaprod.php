<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
        <th>produto</th>
        <th>marca</th>
        <th>tamanho</th>
        <th>preco</th>
        <th>cor</th>
        <th>genero</th>
        <th>DTcompra</th>
        </tr>
        <tr>
            <td><?php echo  $_GET ['produto'];?></td>
            <td><?php echo  $_GET ['marca'];?></td>
            <td><?php echo  $_GET ['tamanho'];?></td>
            <td><?php echo  $_GET ['preco'];?></td>
            <td><?php echo  $_GET ['cor'];?></td>
            <td><?php echo  $_GET ['genero'];?></td>
            <td><?php echo  $_GET ['DTcompra'];?></td>
        </tr>
</table>
</body>
</html>