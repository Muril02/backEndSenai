<?php

class Produtos{
    public $nome;
    public $categoria;
    public $fornecedor;
    public $valor;
    public $quantidade_disp;
}


$prod1 = new Produtos();
$prod1->nome = "Doritos";
$prod1->categoria = "Salgado";
$prod1->fornecedor = "Elma Chips";
$prod1->valor = 15;
$prod1->nome = 600;

$prod2 = new Produtos();
$prod2->nome = "Coca";
$prod2->categoria = "Bebida";
$prod2->fornecedor = "Coca cola";
$prod2->valor = 10;
$prod2->quantidade_disp = 800;

$prod3 = new Produtos();
$prod3->nome = "Neve";
$prod3->categoria = "Higiene";
$prod3->fornecedor = "Suzano";
$prod3->valor = 45;
$prod3->quantidade_disp = 50;