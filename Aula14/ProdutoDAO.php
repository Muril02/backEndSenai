<?php

require "Produto.php";

class ProdutoDAO{

    private $Produtos = [];

    private $Arquivo = "produtos.json";

    public function __construct(){
        if(file_exists($this->Arquivo)){

            $dados = file_get_contents($this->Arquivo);

            $dados = json_decode($dados, true);

            if($dados){
                foreach($dados as $codigo => $valor){
                    $this->Produtos[$codigo] = new Produto(
                        $valor['codigo'],
                        $valor['nome'],
                         $valor['preco']
                    );
                }
            }
        }
    }


    public function salvarNoArquivo(){
        $variavel = [];
        foreach($this->Produtos as $codigo => $valor){
            $variavel[$codigo] = [
                'codigo' => $valor->getCodigo(),
                'nome' => $valor->getNome(),
                'preco' => $valor->getPreco()
            ];
        }
        file_put_contents($this->Arquivo, json_encode($variavel,  JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }


    public function adicionarProduto(Produto $produto){
        $this->Produtos[$produto->getCodigo()] = $produto;
        (float)$this->Produtos[$produto->getCodigo()]->getPreco();
        echo var_dump($this->Produtos);
        $this->salvarNoArquivo();
    }


    public function excluirProduto($id){
        if($this->Produtos[$id]){
            unset($this->Produtos[$id]);
        }
        $this->salvarNoArquivo();
    }


   public function atualizarProduto($codigo, $nome,$preco){
        // Método update -> para atualizar informações de um objeto ja existente
        if(isset($this->Produtos[$codigo])) {
            $this->Produtos[$codigo]->setNome($nome);
            $this->Produtos[$codigo]->setPreco((float)$preco);
        }
        $this->salvarNoArquivo();
    }

    public function listarProduto(){
        return $this->Produtos;
    }
}