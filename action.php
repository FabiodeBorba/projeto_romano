<?php
error_reporting(false);


$entrada1 = strtoupper($_POST['entrada1']);
$entrada2 = strtoupper($_POST['entrada2']);
$operacao = $_POST['operacao'];


function romanos($entrada1, $entrada2, $operacao)
{ 

$i = 1;
$v = 5;
$x = 10;
$l = 50;
$c = 100;
$d = 500;
$m = 1000;

$res = [];

$input = [$entrada1, $entrada2];

for($e = 0; $e < count($input); $e++):
    
    $resultado = explode(' ', $input[$e]);

    (array) $data = [];

    for($j = 0; $j < count($resultado); $j++)
    {
        
        if($resultado[$j] == 'I') {
            array_push($data, $i);

        }elseif($resultado[$j] == 'V') {
            array_push($data, $v);
            
        }elseif($resultado[$j] == 'X') {
            array_push($data, $x);
            
        }elseif($resultado[$j] == 'L') {
            array_push($data, $l);
            
        }elseif($resultado[$j] == 'C') {
            array_push($data, $c);
            
        }elseif($resultado[$j] == 'D') {
            array_push($data, $d);

        }else {
            array_push($data, $m);
        }
    }

    $data = array_reverse($data);

    echo '<pre>';
    print_r($resultado);
    echo '</pre>';

    $ant = 0;
    $result = $data['0'];

    for($f = 0; $f < count($data); $f++)
    {
        $post = ($data[$f+1]) ? $data[$f+1] : null;

        if(isset($post)){
            if($data[$f] > $post){
                $result -= $post;
            }else{
                $result += $post;
            }
        }
    }
    echo "<br>";
    echo "------------ <br />";
    echo ($result);
    echo "<br />------------ <br /><br />";

    array_push($res, $result);


endfor;

echo "---------------------RESULTADOS FINAIS---------------------";    

    echo '<pre>';
    print_r($res);
    echo '</pre>';

    if($operacao == 'soma'){
        $soma = ($res['0'] + $res['1']);
        print 'SOMA: '. $soma .'<br />';
        print transformaRomano($soma);

    }elseif ($operacao == 'divisao'){
        $divisao = ($res['0'] / $res['1']);
        echo 'DIVISÃO: '. ($divisao) .'<br />';
        print transformaRomano(ceil($divisao));

    }elseif ($operacao == 'subtracao'){
        $subtracao = ($res['0'] - $res['1']);
        echo 'SUBTRAÇÃO: '. $subtracao .'<br />';
        print transformaRomano($subtracao);

    }elseif ($operacao == 'multiplicacao'){
        $multiplicacao = ($res['0'] * $res['1']);
        echo 'MULTIPLICAÇÃO: '. $multiplicacao.'<br />';
        print transformaRomano($multiplicacao);

    }
}

function transformaRomano($valor)
{
    $lista = [
        'M'     =>1000,
        'CM'    =>900,
        'D'     =>500,
        'CD'    =>400,
        'C'     =>100,
        'XC'    =>90,
        'L'     =>50,
        'XL'    =>40,
        'X'     =>10,
        'IX'    =>9,
        'V'     =>5,
        'IV'    =>4,
        'I'     =>1 
    ];
    
    while($valor > 0) {
        foreach($lista as $key => $value) {
            if($valor >= $value) {
                $valor -= $value;
                $valor_convertido .= $key;
                break;
            }
        }
    }

    return $valor_convertido;

}

romanos($entrada1,$entrada2, $operacao);




