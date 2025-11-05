<?php


class Bebidas{


    private $nome;
    private $categoria;
    private $volume;
    private $valor;
    private $qtde;


    public function __construct($Nome, $Categoria, $Volume, $Valor, $Qtde){
        $this->setCat($Categoria);
        $this->setNome($Nome);
        $this->setQtde($Qtde);
        $this->setValor($Valor);
        $this->setVolu($Volume);
    }

    
    public function getNome(){
        return $this->nome;
    }
    public function getCat(){
        return $this->categoria;
    }
    public function getVolu(){
        return $this->volume;
    }
    public function getValor(){
        return $this->valor;
    }
    
    public function getQtde(){
        return $this->qtde;
    }



    public function setQtde($valor){
        $this->qtde = (int)$valor;
    }
    public function setValor($valor){
        $this->valor = (float)$valor;
    }
    public function setVolu($valor){
        $this->volume = (float)$valor;
    }
    public function setCat($valor){
        $this->categoria = (string)$valor;
    }
    public function setNome($valor){
        $this->nome = (string)$valor;
    }




}