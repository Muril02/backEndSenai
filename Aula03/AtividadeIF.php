
<?php
//  Verificação idade 

// $idade = (string) readline(prompt: "Digite a sua idade: ");

// if($idade >= 18){
//     echo "Você é maior de idade";
// }else{
//     echo "Você é menor de idade";
// }


//  Classificação de idade

// $nota = 8;

// if($nota >= 9){
//     echo "Excelente";
// }elseif($nota >= 7 && $nota < 9){
//     echo "Bom";
// }else{
//     echo "Reprovado";
// }


// Dia da semana

// $diaSemana = (int) readline(prompt: "Digite o número desejado: ");

// switch ($diaSemana) {
//     case 1:
//         echo "Domingo";
//         break;
//     case 2:
//         echo "Segunda";
//         break;
//     case 3:
//         echo "Terça";
//         break;
//     case 4:
//         echo "Quarta";
//         break;
//     case 5:
//         echo "Quinta";
//         break;
//     case 6:
//         echo "Sexta";
//         break;
//     case 7:
//         echo "Sabádo";
//         break;
//     default:
//         echo "Número inválido";
// }


// Calculadora 

// $valor1 = (float) readline(prompt: "Digite o primeiro número : ");
// $valor2 = (float) readline(prompt: "Digite o segundo número : ");

// $operacao = (string) readline(prompt: "Digite o símbolo da sua operação : ");

// switch($operacao){
//     case '+':
//         echo "Resultado: " . $valor1 + $valor2;
//         break;
//     case '-': 
//         echo "Resultado: " . $valor1 - $valor2;
//         break;
//     case '/': 
//         echo "Resultado: " . $valor1 / $valor2;
//         break;
//     case '*': 
//         echo "Resultado: " . $valor1 * $valor2;
//         break;
//     default: 
//         echo "Operador inválido";
// }


// Contagem progressiva 

// for($i = 0; $i <= 10; $i++){
//     echo "\nContagem atual: " . $i;
// }


// Contagem regressiva

// for($i = 10; $i >= 0; $i--){
//     echo "\nContagem atual: " . $i;
// }


// Numeros pares

// $numero = 100;

// for($i = 0; $i <= $numero;$i++ ){
//     if($i % 2 == 0){
//         echo "\n Número par: " . $i;
//     }
// }

// Tabuada 

// $numero = (int) readline(prompt: "Digite seu número: ");

// for($i = 0; $i <= 10; $i ++){
//     echo "\nValor $numero x $i: " . $i * $numero;
// }


// Temperatura

// $temp = (float) readline(prompt: "Digite a temperatura: ");

// if($temp < 15){
//     echo "Frio";
// }elseif($temp > 15 && $temp <= 25){
//     echo "Agrádavel";
// }else{
//     echo "Quente";
// }


// Menu interativo

$numero = (int) readline("
1- Olá\n
2- Data\n
3- Sair\n
Digite o que irá fazer: ");

for($i = 0; $i >5; $i++){

echo $numero;

    switch($numero){
    case 1:
        echo "Olá";
        echo "1- Olá\n
              2- Data\n
              3- Sair ";
        break;
    case 2:
        echo "Data atual: 13/08";
        break;
    case 3: 
        echo "Sair";
        break;
    default: 
        'Inválido';
        break;
}}

// Comparar tipos variáveis

// $var1 = readline("Valor 1: ");
// $var2 = readline("Valor 2: ");

// if(gettype($var1) == gettype($var2)){
//     echo "Suas váriaveis são iguais!. Primeiro valor tipo " . gettype($var1) . ". E segundo valor " . gettype($var2);
// }else{
//     echo "Suas váriaveis são diferentes!. Primeiro valor tipo " . gettype($var1) . ". E segundo valor " . gettype($var2);
// }
