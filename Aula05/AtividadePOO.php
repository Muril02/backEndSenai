<?php

class Cachorro
{
    public $raca;
    public $nome;
    public $castrado;
    public $sexo;

    public function __construct($raca, $nome, $castrado, $sexo)
    {

        $this->raca = $raca;
        $this->nome = $nome;
        $this->castrado = $castrado;
        $this->sexo = $sexo;
    }

    public function latir(){
        echo "O cachorro $this->nome da raça $this->raca latiu\n";
    }

    public function mijada(){
        echo "O cachorro $this->nome da raça $this->raca mijou no poste\n";
    }

}

$cachorro1 = new Cachorro("Dobberman", "Rodolfo", false, "M");
$cachorro2 = new Cachorro("Shitzu", "Marcio", true, "M");
$cachorro3 = new Cachorro("Dalmata", "Junior", true, "M");
$cachorro4 = new Cachorro("Dachshund", "Salsicha", false, "M");
$cachorro5 = new Cachorro("Saint Bernard", "Polly", true, "F");
$cachorro6 = new Cachorro("Labrador", "Paçoca", true, "M");
$cachorro7 = new Cachorro("Pinscher", "Nina", false, "F");
$cachorro8 = new Cachorro("Border Collie", "Spike", true, "M");
$cachorro9 = new Cachorro("Corgi", "Bomber", true, "M");
$cachorro10 = new Cachorro("Dobberman", "Rodolfo", false, "M");

// $cachorro9->latir();
// $cachorro2->mijada();
// $cachorro3->mijada();

class Usuario
{
    public $nome;
    public $cpf;
    public $sexo;
    public $email;
    public $estado_civil;
    public $cidade;
    public $estado;
    public $endereco;
    public $cep;

    public function __construct($nome, $cpf, $sexo, $email, $estado_civil, $cidade, $estado, $endereco, $cep)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
        $this->email = $email;
        $this->estado_civil = $estado_civil;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->endereco = $endereco;
        $this->cep = $cep;
    }

    public function testandoReservista(){
        if($this->sexo == "M"){
            echo "Apresente seu certificado de reservista do tiro de guerra!\n";
        }else{
            echo "Tudo certo!\n";
        }
    }

    public function pedindoAumento(){
        $texto = readline("Digite quanto quer de aumento: ");
        if(floatval($texto) <= 1){
            echo "O seu pedido de aumento de R$$texto foi aprovado!\n";
        }else{
            echo "O seu pedido de aumento de R$$texto foi negado! Ta pedindo demais.\n";
        }
    }

    public function casamento($anos_casado){
        switch($this->estado_civil){
            case "Casado":
            echo "Parabéns pelo seu casamento de $anos_casado!";
            break;
            default: 
            echo "Oloco";
            break;
        }
        
    }
}

$user1 = new Usuario(
    'Robson',
    "123.345.667.64",
    "M",
    "robinson@gmail.com",
    "Viúvo",
    "Rolandia",
    "PR",
    "Rua dos Ipês",
    "86604-470"
);

$user2 = new Usuario(
    'Geraldo',
    "153.753.083.21",
    "M",
    "geralds@gmail.com",
    "Solteiro",
    "Luís Correia",
    "PI",
    "Praia do Arrombado",
    "64220-000"
);

$user3 = new Usuario(
    'Manoel',
    "233.390.173.99",
    "M",
    "manoel@gmail.com",
    "Casado",
    "Curralinho",
    "PR",
    "Avenida Jarbas Passarinho",  
    "68815-970"
);

$user1->pedindoAumento();
$user3->testandoReservista();
$user3->casamento(2);

  

