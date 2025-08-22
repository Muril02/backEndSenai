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


class Usuario
{
    public $nome;
    public $cpf;
    public $sexo;
    public $email;
    public $estado_civil;
    public $civil;
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


  