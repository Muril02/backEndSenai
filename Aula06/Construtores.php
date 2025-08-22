<?php


class Produtos{
    public $nome;
    public $categoria;
    public $fornecedor;
    public $qtde_estoque;


    public function __construct($nome, $categoria, $fornecedor, $qtde_estoque){
        $this->nome = $nome;
        $this->categoria = $categoria;
        $this->fornecedor = $fornecedor;
        $this->qtde_estoque = $qtde_estoque;
    }
    public function produto_vendido($qtde_vendida){
        $this->qtde_estoque -=$qtde_vendida;
        echo $this->qtde_estoque;
    }
}


$bolacha = new Produtos("Toddy", "Doces", "NaoSei", 50);
// $bolacha = new Produtos();
// $bolacha->nome = "Toddy";
// $bolacha->fornecedor = "NaoSei";
// $bolacha->qtde_estoque = "100";


$bolacha = new Produtos("Oliron", "Mantimentos", "Reserva nobre", 130);