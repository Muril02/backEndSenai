<?php

class Livro{

     private $titulo;
    private $genero;
    private $ano;
    private $autor;
    private $qtde;


    public function __construct($Titulo,$Autor ,$Ano,$Genero, $Qtde){
        $this->setGen($Genero);
        $this->setTitulo($Titulo);
        $this->setQtde($Qtde);
        $this->setAutor($Autor);
        $this->setAno($Ano);
    }

    
    public function getTitulo(){
        return $this->titulo;
    }
    public function getGen(){
        return $this->genero;
    }
    public function getAno(){
        return $this->ano;
    }
    public function getAutor(){
        return $this->autor;
    }
    
    public function getQtde(){
        return $this->qtde;
    }



    public function setQtde($valor){
        $this->qtde = (int)$valor;
    }
    public function setAutor($valor){
        $this->autor = (string)$valor;
    }
    public function setAno($valor){
        $this->ano = (int)$valor;
    }
    public function setGen($valor){
        $this->genero = (string)$valor;
    }
    public function setTitulo($valor){
        $this->titulo = (string)$valor;
    }



}