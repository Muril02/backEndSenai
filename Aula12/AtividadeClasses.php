<?php

// Cenário 1

// Relações
// Turistas -> Pais
// Turistas -> Comida
// Turistas -> PraiaRio
// Pais -> Comida
// Pais -> PraiaRio

class Turistas
{

    public $QuantidadeTuristas;
    // public $Pais = new Pais("Angola", "Africa");
    // public $Comida = new Comida;
    // public $PraiaRio = new PraiaRio;

    public function __construct($QuantidadeTuristas)
    {
        $this->setTuristas($QuantidadeTuristas);
    }

    public function getTuristas()
    {
        return  `A quantidade de turistas é: $this->QuantidadeTuristas`;
    }

    public function setTuristas($QuantidadeRecebida)
    {
        $this->QuantidadeTuristas = abs((int) $QuantidadeRecebida);
    }

    public function Nadar()
    {
        return `Os $this->QuantidadeTuristas turistas estão nadando`;
    }

    public function Comer()
    {
        return `Os $this->QuantidadeTuristas turistas estão comendo`;
    }

    public function PegarInfos()
    {
        $Pais = new Pais("Angola", "Africa");
        $Comida = new Comida("Calulu", "Salgado", "Angola");
        $PraiaRio = new PraiaRio("Rio Kwanza", null, "1000km");
        $NomePais = $Pais->getNome();
        $NomeComida = $Comida->getNomeComida();
        $NomeRioPraia = $PraiaRio->getPraiaNome() ? $PraiaRio->getPraiaNome() : $PraiaRio->getRioNome();
    }
}


class Pais
{

    public $Nome;
    public $Continente;

    public function __construct($nome, $continente)
    {
        $this->setNome($nome);
        $this->setContinente($continente);
    }


    public function getNome()
    {
        return $this->Nome;
    }

    public function getContinente()
    {
        return $this->Continente;
    }

    public function setNome($valorRecebido)
    {
        $this->Nome = ucwords(strtolower($valorRecebido));
    }

    public function setContinente($valorRecebido)
    {
        $this->Continente = ucwords(strtolower($valorRecebido));
    }
}
class Comida
{

    public $NomeComida;
    public $TipoComida;
    public $PaisTipico;

    public function __construct($nomeComida, $tipoComida, $paisTipico)
    {
        $this->setNomeComida($nomeComida);
        $this->setTipoComida($tipoComida);
        $this->setPaisTipico($paisTipico);
    }

    public function getNomeComida()
    {
        return $this->NomeComida;
    }
    public function getTipoComida()
    {
        return $this->TipoComida;
    }

    public function setNomeComida($valor)
    {
        $this->NomeComida = ucwords(strtolower($valor));
    }
    public function setTipoComida($valor)
    {
        $this->TipoComida = ucwords(strtolower($valor));
    }
    public function setPaisTipico($valor)
    {
        $this->PaisTipico = ucwords(strtolower($valor));
    }
}

class PraiaRio
{

    public $RioNome;
    public $PraiaNome;
    public $Tamanho;

    public function __construct($rioNome, $praiaNome, $tamanho)
    {
        $this->setPraiaNome($praiaNome);
        $this->setRioNome($rioNome);
        $this->setTamanho($tamanho);
    }

    public function getPraiaNome()
    {
        return $this->PraiaNome;
    }

    public function getRioNome()
    {
        return $this->RioNome;
    }
    public function getTamanho()
    {
        return $this->Tamanho;
    }


    public function setRioNome($valorRecebido)
    {
        $this->RioNome = ucwords(strtolower($valorRecebido));
    }

    public function setPraiaNome($valorRecebido)
    {
        $this->PraiaNome = ucwords(strtolower($valorRecebido));
    }
    public function setTamanho($valorRecebido)
    {
        $this->Tamanho = ucwords(strtolower($valorRecebido));
    }
}


// Exercicio 2

// Herois -> Local
// Herois se relacionam com local

class Herois{
    public $Nome;

    public function __construct($nome){
        $this->Nome = $nome;
    }
    

    public function Treinar(){
        return `$this->Nome está treinando no cotil`;
    }

    public function DoarBrinquedo(){
        return `$this->Nome doou brinquedos`;
    }

}

class Local{
    public $NomeLocal;

    public function __construct($nomeLocal){
        $this->NomeLocal = $nomeLocal;
    }
}


// Fantasia e destino

class Personagens{
    public $Nome;

    public function __construct($nome){
        $this->Nome = $nome;
    }

    public function Amar(){
        return `$this->Nome está amando`;
    }

    public function Comer(){
        return `$this->Nome está comendo`;
    }
} 


// Ciclo de vida

// Planeta -> Pessoa

class Pessoa{

    public $NomePessoa;

    public function __construct($nomePessoa){
        $this->NomePessoa = $nomePessoa;
    }
    public function Engravidar(){
        `$this->NomePessoa está grávida`;
    }
    public function Nascer(){
        `$this->NomePessoa nasceu!`;
    }
    public function Escolhas(){
        `$this->NomePessoa escolheu!`;
    }
    public function DoarSangue(){
        `$this->NomePessoa doou sangue!`;
    }
    public function Cresceu(){
        `$this->NomePessoa Cresceu!`;
    }

}
class Planeta{

    public $NomePlaneta;

    public function __construct($nomePlaneta){
        $this->NomePlaneta = $nomePlaneta;
    }
}


// Cenário 5

// Usuarios -> Livros

class Usuarios{
    public $NomeUser;
    public $TipoUser;

    public function __construct($nomeUser, $tipoUser){
        $this->NomeUser = $nomeUser;
        $this->TipoUser = $tipoUser;
    }

    public function FazerEmprestimo(){
        `$this->NomeUser emprestou um livro!`;
    }
}
class Livros{
    public $NomeLivro;
    public $TipoLivro;

    public function __construct($nomeLivro, $tipoLivro){
        $this->NomeLivro = $nomeLivro;
        $this->TipoLivro = $tipoLivro;
    }

}


// Cenário 6

// Clientes -> Filme

class Clientes{
    public $NomeCliente;

    public function __construct($nomeCliente){
        $this->NomeCliente = $nomeCliente;
    }

    public function ComprarIngresso(){
        `$this->NomeCliente comprou um ingresso!`;
    }

}


class Filme{
    public $NomeFilme;

    public function __construct($nomeFilme){
        $this->NomeFilme = $nomeFilme;
    }
}