<?php

class Cliente{

    private $nome;
    private $cpf;
    private $cep;
    private $telefone;

    public function __construct($Nome, $Cpf,$Cep, $Telefone){
        $this->nome = $Nome;
        $this->cpf = $Cpf;
        $this->cep = $Cep;
        $this->telefone = $Telefone;
    }

    public function getNome(){
        return $this->nome;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function getCep(){
        return $this->cep;
    }
    public function getTelefone(){
        return $this->telefone;
    }

    public function setNome($nomeRecebido){
        $this->nome = $nomeRecebido;
    }
    public function setCpf($cpfRecebido){
        $this->cpf = $cpfRecebido;
    }
    public function setCep($cepRecebido){
        $this->cep = $cepRecebido;
    }
    public function setTelefone($telefoneRecebido){
        $this->telefone = $telefoneRecebido;
    }

    public function getInfo() {
        return "Nome: {$this->nome}, CPF: {$this->cpf}";
    }

}