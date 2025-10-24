<?php

// Crie uma classe 'Produtos' com os atributos: código, nome e preco. Após isso
// faça a ProdutosDAO para a utilização dos métodos CRUD. Por último 
// faça um index.php para testar a criação e maipulação dos objetos. 
// Implemente a persistência de dados com o arquivo 'produtos.json'


class Produto{

    private $Codigo;
    private $Nome;
    private $Preco;

    public function __construct($codigo, $nome, $preco){
        $this->setCodigo($codigo);
        $this->setNome($nome);
        $this->setPreco($preco);
    }

    public function getCodigo(){
        return $this->Codigo;
    }
    public function getNome(){
        return $this->Nome;
    }
    public function getPreco(){
        return $this->Preco;
    }



    public function setCodigo($valorCod){
        $this->Codigo = abs($valorCod);
    }
    public function setNome($valorNome){
        $this->Nome = ucwords(strtolower($valorNome));
    }
    public function setPreco($valorPreco){
        $this->Preco = number_format($valorPreco);
    }


}
