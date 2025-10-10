<?php

// Relacionamento entre classes: a refêrencia par análise será sempre os objetos daquela determinada classe
// Associação: Conexão entre duas classes,  onde os objetos podem interagir compartilhando informações.
// Exemplo: Pessoa e Empresa. Pode-se escolher um objeto de cada classe para análise -> Joãozinho trabalha na empresa Ajinomoto. Nesse tipo de relacionamento 
// as classes podem existir independentemente 

// Agregação: Conexão entre duas classes, onde uma delas é uma parte de outra, mas o objeto "parte" pode existir
// independentemente do objeto "todo". Exemplo carro e motorista -> Robson pode dirigir um del rey, sendo uma parte que compõe o carro como um todo
// mas pode existir independentemente do carro

// Composição: É uma conexão mais forte entre classes, onde a existência do objeto "parte" é diretamente ligada ao objeto
// "todo". Isso quer dizer que se o todo deixa de existir, a "parte" também deixa. Exemplo: Carro e Motor. Relacionado os objetos
// -> o carro Audi R8 pode conter um motor V12 5.2 aspirado, mas o motor deixa de existir se o carro também deixa.

class Aluno{
    private $Id;
    private $Nome;
    private $Curso;

    public function __construct($id,$nome, $curso ){
        $this->Nome = $nome;
        $this->Id = $id;
        $this->Curso = $curso;
    }

    public function setId($id){
        $this->Id = $id;
    }
    public function setNome($nome){
        $this->Nome = $nome;
    }
    public function setCurso($curso){
        $this->Curso = $curso;
    }

    public function getId(){
        return $this->Id;
    }
    public function getNome(){
        return $this->Nome;
    }
    public function getCurso(){
        return $this->Curso;
    }

}