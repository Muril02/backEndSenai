<?php

// Polimorfismo
// O termo Polimorfismo significa "várias formas". Associando isso a Programação Orientada a Objetos, o conceito se trata de várias classes e suas intâncias (objetos) respondendo
// a um mesmo método de formas diferentes. No exemplo do Interface da Aula_09, temos um método CalcularArea() que responde de foram diferente á classe Quadrado, á classe Pentágono
// e a classe círculo. Isso quer dizer que a função é a mesma - calcular a área da foram geométrica - mas a operação muda de acordo com a figura


// Crie um método chamado "mover*()", aonde ele responde de várias formas diferentes, para as classes: Carro, Avião, Barco, Elevador.

interface MoverInterface{
    public function mover($valor);
}


class Carro2 implements MoverInterface{
    public function mover($carro){
        echo "O carro $carro está andando \n";
    }
}


class Aviao implements MoverInterface{
    public function mover($aviao){
        echo "O aviao $aviao está voando \n";
    }
}

class Navio implements MoverInterface{
    public function mover($navio){
        echo "O aviao $navio está navegando \n";
    }
}


// $car = new Carro2();
// $car->mover("Celta");

// $plane = new Aviao();
// $plane->mover("Boing 77");

// $boat = new Navio();
// $boat->mover("Diang Venus");


interface Som{
    public function emitirSom($valor);
}

class Cachorro2 implements Som{
    public function emitirSom($raca){
        echo "O cachorro da raça $raca latiu!";
    }
}


// $dog = new Cachorro2();
// $dog->emitirSom("Poodle");


interface Envio{
    public function Enviar();
}

class Email implements Envio{
    public function ExibirEnvio(){
        echo "Email enviado! \n";
    }

    public function Enviar(){
        echo "Enviando Email... \n";
        $this->ExibirEnvio();
    }

}

class Sms implements Envio{
    public function ExibirEnvio(){
        echo "Sms enviado! \n";
    }

    public function Enviar(){
        echo "Enviando Sms... \n";
        $this->ExibirEnvio();
    }

}

// $email = new Email();
// $email->Enviar();

// $sms = new Sms();
// $sms->Enviar();



interface Calc{
    public function Somar();
}

class Calculadora implements Calc{

    private $valor1;
    private $valor2;
    private $valor3;

public function __construct($valor1, $valor2, $valor3){
    $this->valor1 = $valor1;
    $this->valor2 = $valor2;
    $this->valor3 = $valor3;
}

    public function Somar(){
        if($this->valor3 == 0){
            $conta = $this->valor1 + $this->valor2;
            echo $conta;
        }else{
            $conta = $this->valor1 + $this->valor2 + $this->valor3;
            echo $conta;
        }
    }

}



$conta = new Calculadora(5,9,0);
$conta->Somar();