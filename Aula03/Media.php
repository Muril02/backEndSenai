<?php

$nota1 = 2;
$nota2 = 4;

$divisao = ($nota1 + $nota2) / 2;

$presenca = 30;
$nome = "Enzo Enrico";
// if($divisao >= 7 && $presenca >= 75){
//     echo "Aluno aprovado! \n", "Nota: $divisao e Presencça: $presenca%";
// }else{
//     echo "Aluno reprovado! \n", "Nota: $divisao e Presencça: $presenca%";
// }


if($divisao >= 7 && $presenca >= 75 || $nome == "Enzo Enrico"){
    echo "Aluno aprovado! \n", "Nota: $divisao e Presencça: $presenca%";
}else{
    echo "Aluno reprovado! \n", "Nota: $divisao e Presencça: $presenca%";
}