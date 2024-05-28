<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<pre>
<h2>ARRAY MULTIDIMENSIONAL</h2>
<?php
$array= [
    'alunos'=> [

        [
        'id'=>1,
        'nome'=>'fabio',
        'idade'=>20,
        'pais'=>'brasil',
        'cidade'=>'guanambi',
        'endereco'=>'xxxxxxxxxx'

    ],

    [
    'id'=>2,
    'nome'=>'jao',
    'idade'=>32,
    'pais'=>'brasil',
    'cidade'=>'SP',
    'endereco'=>'xxxxxxxxxx'
    ],

    [
    'id'=>3,
    'nome'=>'maria',
    'idade'=>42,
    'pais'=>'brasil',
    'cidade'=>'gramado',
    'endereco'=>'xxxxxxxxxx'
    ],
  ]
];
echo '<pre>';
print_r($array);
echo'</pre>';

echo'<pre>';
print_r($array['alunos'][2]['nome']);
echo"<br>";
print_r($array['alunos'][2]['endereco']);
echo'</pre>';
?>
   </pre> 

  <pre>
   <table>
         <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>pais</th>
            <th>Endereco</th>
            <th>cidade</th>
            </tr>

            <tr>
            <td><?php print_r($array['alunos'][0]['id']);?></td>
            <td><?php print_r($array['alunos'][0]['nome']);?></td>
            <td><?php print_r($array['alunos'][0]['idade']);?></td>
            <td><?php print_r($array['alunos'][0]['pais']);?></td>
            <td><?php print_r($array['alunos'][0]['endereco']);?></td>
            <td><?php print_r($array['alunos'][0]['cidade']);?></td>
            </tr>

            <tr>
            <td><?php print_r($array['alunos'][1]['id']);?></td>
            <td><?php print_r($array['alunos'][1]['nome']);?></td>
            <td><?php print_r($array['alunos'][1]['idade']);?></td>
            <td><?php print_r($array['alunos'][1]['pais']);?></td>
            <td><?php print_r($array['alunos'][1]['endereco']);?></td>
            <td><?php print_r($array['alunos'][1]['cidade']);?></td>
            </tr>

            <tr>
            <td><?php print_r($array['alunos'][2]['id']);?></td>
            <td><?php print_r($array['alunos'][2]['nome']);?></td>
            <td><?php print_r($array['alunos'][2]['idade']);?></td>
            <td><?php print_r($array['alunos'][2]['pais']);?></td>
            <td><?php print_r($array['alunos'][2]['endereco']);?></td>
            <td><?php print_r($array['alunos'][2]['cidade']);?></td>
            </tr>
        
      
</table>
</pre>

<pre>
<table id="alunos">
  
<tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Idade</th>
    <th>Endereco</th>
    <th>Cidade</th>
    <th>Pais</th>
</tr>

  <?php 
  for ($a = 0; $a < count($array['alunos']); $a++)  { ?>
  <tr>
    <td><?php print_r($array['alunos'][$a]['id'])?></td>
    <td><?php print_r($array['alunos'][$a]['nome'])?></td>
    <td><?php print_r($array['alunos'][$a]['idade'])?></td>
    <td><?php print_r($array['alunos'][$a]['pais'])?></td>
    <td><?php print_r($array['alunos'][$a]['endereco'])?></td>
    <td><?php print_r($array['alunos'][$a]['cidade'])?></td>
  </tr>
<?php
}?>
</table>
</pre>
</body>
</html>
