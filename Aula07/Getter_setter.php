<?php

class Pessoa
{

    private $nome;
    private $cpf;
    private $telefone;
    private $email;
    private $idade;
    private $senha;

    public function __construct($nome, $cpf, $telefone, $idade, $email, $senha)
    {
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
        $this->setIdade($idade);
        $this->email = $email;
        $this->senha = $senha;
    }

    public function setNome($nome)
    {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setCpf($cpf)
    {
        $this->cpf = preg_replace('/\D/', '', $cpf);
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = preg_replace('/\D/', '', $telefone);
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setIdade($idade)
    {
        $this->idade = abs((double)$idade);
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function exibirInfo(){
        return "Nome: $this->nome \n".
        "Idade: $this->idade \n".
        "CPF: $this->cpf \n".
        "Telefone: $this->telefone \n".
        "Email: $this->email \n".
        "Senha: $this->senha";
    }
}


$aluno1 = new Pessoa(
    "MUriLo",
    "423.414.756-65",
    "19 9872812-39",
    -1,
    "emailbrabo@gmail.com",
    "teste34567784"
);



echo $aluno1->exibirInfo();