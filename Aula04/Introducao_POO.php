<?php

// Modelagem sem POO

$modelo = "versa";
$marca = "nissan";
$ano = 2025;
$donos_num = 1;
$revisao = false;

$modelo1 = "911";
$marca1 = "Porsche";
$ano1 = 2026;
$donos_num1 = 1;
$revisao1 = false;

$modelo2 = "m5";
$marca2 = "BMW";
$ano2 = 2025;
$donos_num2 = 1;
$revisao2 = false;

$modelo3 = "Dolphin";
$marca3 = "BYD";
$ano3 = 2025;
$donos_num3 = 1;
$revisao3 = true;

// function passouRevisao($revisao) {
//     $revisao= false;
//     return $revisao;
// }

// $revisao = passouRevisao($revisao);


// function novoDono($donos){
//    return  $donos + 1;
// }

// $donos_num = novoDono($donos_num);


// function exibirDados($model, $marca, $ano, $donos_num, $revisao){
//     $revisao = false ? "Sim" : "Não";
//     $retorno = "O carro $marca $model, ano $ano passou por revisão: $revisao. Número de donos: $donos_num \n";
//     return $retorno;
// }

// $exibir = exibirDados($modelo, $marca, $ano, $donos_num, $revisao);
// $exibir1 = exibirDados($modelo1, $marca1, $ano1, $donos_num1, $revisao1);
// $exibir2 = exibirDados($modelo2, $marca2, $ano2, $donos_num2, $revisao2);
// $exibir3 = exibirDados($modelo3, $marca3, $ano3, $donos_num3, $revisao3);

// echo $exibir;
// echo $exibir1;
// echo $exibir2;
// echo $exibir3;


// function semiNovo($ano){
//     return ($ano - 2025) * 1 > 3 ? "True\n" : "False\n"; 
// }

// $semiNovo = semiNovo($ano);
// $semiNovo1 = semiNovo($ano1);
// $semiNovo2 = semiNovo($ano2);
// $semiNovo3 = semiNovo($ano3);

// echo $semiNovo, $semiNovo1, $semiNovo2, $semiNovo3;


// function precisaRev($revisao, $ano){
//     return $revisao == false && $ano < 2022 ? "Precisa de revisão\n" : "Não precisa\n";
// }

// $precisaRevisao = precisaRev($revisao, $ano);
// $precisaRevisao1 = precisaRev($revisao1, $ano1);
// $precisaRevisao2 = precisaRev($revisao2, $ano2);
// $precisaRevisao3 = precisaRev($revisao3, $ano3);

// echo $precisaRevisao;
// echo $precisaRevisao1;
// echo $precisaRevisao2;
// echo $precisaRevisao3;


function calcValue($marca, $ano, $dono){
    if($marca === "BYD"){
        $base = 150;
        $donoValue = $dono > 1 ? $dono -1 : $dono;
        $calcAno = 2025 - $ano;
        $trueValue = $calcAno >= -1 ? $calcAno : 0; 


        $porcent = ($base * 5 / 100) * $donoValue;
        $anoUso = $trueValue <= 1 ? 0 : 3 * $trueValue;
        $calc = ($base - $porcent) - $anoUso;

        return "O valor do seu BYD é: $calc\n";
    }elseif($marca === "Porsche" || $marca === "BMW"){
        $base = 300;
        $donoValue = $dono > 1 ? $dono -1 : $dono;
        $calcAno = 2025 - $ano;
        $trueValue = $calcAno >= -1 ? $calcAno : 0; 


        $porcent = ($base * 5 / 100) * $donoValue;
        $anoUso = $trueValue <= 1 ? 0 : 3 * $trueValue;
        $calc = ($base - $porcent) - $anoUso;

        return "O valor do seu carro da marca $marca é: $calc\n";
    }else{
        $base = 70;
        $donoValue = $dono > 1 ? $dono -1 : $dono;
        $calcAno = 2025 - $ano;
        $trueValue = $calcAno >= -1 ? $calcAno : 0; 


        $porcent = ($base * 5 / 100) * $donoValue;
        $anoUso = $trueValue <= 1 ? 0 : 3 * $trueValue;
        $calc = ($base - $porcent) - $anoUso;

        return "O valor do seu Nissan é: $calc\n";
    }
}

$checkValue = calcValue($marca, $ano, $donos_num);
$checkValue1 = calcValue($marca1, $ano1, $donos_num1);
$checkValue2 = calcValue($marca2, $ano2, $donos_num2);
$checkValue3 = calcValue($marca3, $ano3, $donos_num3);

echo $checkValue;
echo $checkValue1;
echo $checkValue2;
echo $checkValue3;



// class Introducao_POO{
//     private string $modelo;
//     private  string $marca;
//     private int $ano;
//     private bool $revisao;
//     private int $num_donos;
// }