<?php

// Modificaores de acesso:
    // Existem 3 tipos: Public, Private e Protected
    
    // Public Nome: atributos e métodos públicos
    
    // Private Nome: métodos e atributos privados apenas para acesso dentro da classe. Utilizamos getters e setters para acessa-los
    
    // Protected Nome: métodos e atributos públicos protegidos para acesso somente das classes e de suas filhas.
    
    // Pacotes: Sintaxe logo no início do código, que atribui de onde os arquivos pertencem, ou seja, o caminho da pasta em que ele está contido. Exemplo:
    // Namespace Aula09
    
    // Caso tenham arquivos que formam o BackEnd de uma página WEB e possuem a mesma raiz, o namespace será o mesmo
    
namespace Aula09;

// interface Pagamento{
//     public function Pagar($valor);
// }

// class CartaoDeCredito implements Pagamento{
//     public function Pagar($valor){
//         echo "Pagamento realizado com cartão de crédito! Valor: $valor";
//     }
// }

// class PIX implements Pagamento{
//     public function Pagar($valor){
//         echo "Pagamento realizado via PIX! Valor: $valor";
//     }
// }



interface Forma{
    public function calcularArea($valor, $valor2);
}


class Quadrado implements Forma{

    // public function calcularArea($lado){
    //     $calcular = (Float)$lado * $lado;
    //     echo "Sua área é de: $calcular\n";
    //     $this->valorFinal = $calcular;
    // }

    public function calcularArea($lado, $valor){
        $calcular = (Float)$lado * $lado;
        // echo "Sua área é de: $calcular\n";
        return $calcular;
    }

}



class Circulo implements Forma{
    
    public function calcularArea($raio, $valor){
        $calcular = pi()*($raio*$raio);
        echo "A áreia do seu círculo é: $calcular\n";
    }
}



class Pentagono implements Forma{
    public function calcularArea($lados, $ap){
        $calcular = $lados * $ap;
        echo "A área do seu pentágono é: $calcular";
    }
}

$pentagono = new Pentagono();
$pentagono->calcularArea(10, 5);


class Hexagono implements Forma{
    public function calcularArea($valor, $valor2){
        $raiz = sqrt(3);
        $calc = (3 * pow($valor, 2)) / 2;

        echo "O valor da área do seu Hexagono é: $calc √3 cm²";
    }
}

$hexagon = new Hexagono();
$hexagon->calcularArea(9,0);


// $teste = new Quadrado();
// $teste->calcularArea(5.36, 0);