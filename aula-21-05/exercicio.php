<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>exercicio 2AII</h2>
<pre>
<?php
$array= [
    'aluno'=> [
        [
        'id'=>1,
        'nome'=>'fabio',
        'nota' => 9
        ],

        [
            'id'=>2,
            'nome'=>'maria',
            'nota'=> 8
        ],

        [
            'id'=>3,
            'nome'=>'eduarda',
            'nota'=>5

        ],

        [
            'id'=>4,
            'nome'=>'carla',
            'nota'=>6
            
        ],

        [
            'id'=>5,
            'nome'=>'sandra',
            'nota'=>1
           
        ],

        [
            'id'=>6,
            'nome'=>'adraina',
            'nota'=>2
         
        ],
    ]
    ];
    
    echo'<pre>';
        print_r($array['aluno'][0]['nome']);
        echo "<br>";
        print_r($array['aluno'][0]['nota']);
        echo "<br>";
        print_r($array['aluno'][1]['nome']);
        echo "<br>";
        print_r($array['aluno'][1]['nota']);
        echo "<br>";
    echo'</pre>';
    
    echo'<pre>';
        print_r($array['aluno'][4]['nome']);
        echo "<br>";
        print_r($array['aluno'][4]['nota']);
        echo "<br>";
        print_r($array['aluno'][5]['nome']);
        echo "<br>";
        print_r($array['aluno'][5]['nota']);
        echo "<br>";
    echo'</pre>';

       
    echo'<pre>';
        print_r($array['aluno'][2]['nome']);
        echo "<br>";
        print_r($array['aluno'][2]['nota']);
        echo "<br>";
        print_r($array['aluno'][3]['nome']);
        echo "<br>";
        print_r($array['aluno'][3]['nota']);
        echo "<br>";
    echo'</pre>';
 ?>
</pre>   
</body>
</html>