<?php


require_once "ProdutoDAO.php";
require_once "Produto.php";


$tomate = new Produto(1, "Tomate", 12.6);
$maca = new Produto(2, "Maça", 5.78);
$queijoBrie = new Produto(3, "Queijo brie", 99.00);
$iogurte = new Produto(4, "Igurte grego", 11);
$guarana = new Produto(5, "Guaraná Jesus", 15.99);
$bolacha = new Produto(6, "Bolacha Bono", 12.32);
$bic = new Produto(7, "Prestobarba Bic", 9.55);
$desinfetante = new Produto(8, "Desinfetante Urca", 19.79);

$instancia = new ProdutoDAO;
// $instancia->adicionarProduto($tomate);
// $instancia->adicionarProduto($maca);
// $instancia->adicionarProduto($queijoBrie);
// $instancia->adicionarProduto($iogurte);
// $instancia->adicionarProduto($guarana);
// $instancia->adicionarProduto($bolacha);
// $instancia->adicionarProduto($bic);
// $instancia->adicionarProduto($desinfetante);

$instancia->atualizarProduto(8, "Desinfetante Barbarex",  (float)18.4);
$instancia->atualizarProduto(2, "Maca(sem ç)", (float)5.90);
$instancia->atualizarProduto(5, "Guarana Jesus (sem á)", (float)1.99);

// $instancia->excluirProduto($tomate->getCodigo());
// $instancia->excluirProduto($maca->getCodigo());
// $instancia->excluirProduto($queijoBrie->getCodigo());
// $instancia->excluirProduto($iogurte->getCodigo());
// $instancia->excluirProduto($guarana->getCodigo());
// $instancia->excluirProduto($bolacha->getCodigo());
// $instancia->excluirProduto($bic->getCodigo());
// $instancia->excluirProduto($desinfetante->getCodigo());

