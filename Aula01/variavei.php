<?php
    
    // $nome = "Manoel gomis \n";
    // $idade = '54';
    // $ano_atual  = 2025;

    // $data_nasc = $ano_atual-$idade;
    // echo $nome, "você nasceu em: ", $data_nasc;


/*
    Dado uma frase "Programação em php". Transforma-la em maiscula
    */

    // $exerc1 = "Programação em php";
    // echo "\nMínusculo: ", $exerc1;
    // $exerc1 = strtoupper(string: $exerc1);
    // echo "\nMaisculo: ", $exerc1;
    // $exerc1 = strtolower(string: $exerc1);
    // echo "\nMinusculo novamente: ", $exerc1;


    /*
        Numa dada frase "O PHP foi criado em mil novecentos e noventa e cinco"
        Trocar o O por 0, o "a" por 4 e i por 1
        */

        $exerc3 = "O php foi criado em mil novecentos e noventa e cinco";
        echo "\n Antes do comando replace: \n", $exerc3;
        $exerc3 = str_replace(search: ['o', 'a', 'i'], replace: ['0', '4','1'], subject:$exerc3);
        echo "\n Após o comando replace: \n", $exerc3;


