<?php

require_once "Bebidas.php";

class BebidasDAO{

    private $Arquivo = "Bebidas.json";
    private $BebidasArray = [];

    public function __construct(){
        if(file_exists($this->Arquivo)){

            $data = file_get_contents($this->Arquivo);

            $data = json_decode($data, true);

            if($data){
                foreach($data as $id => $valor){
                    $this->BebidasArray[$id] = new Bebidas(
                        $valor["Nome"],
                        $valor['Categoria'],
                        $valor['Volume'],
                        $valor['Valor'],
                        $valor['Qtde']
                    );
                }
            }

        }
    }

    public function SalvarNoArquivo(){
        $var = [];
        foreach($this->BebidasArray as $id => $valor){
            $var[$id] = [
                'Nome' => $valor->getNome(),
                'Categoria' => $valor->getCat(),
                'Volume' => $valor->getVolu(),
                'Valor' => $valor->getValor(),
                'Qtde' => $valor->getQtde()
            ];
        }
        file_put_contents($this->Arquivo, json_encode($var, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }


    public function AdicionarBebida(Bebidas $bebida){
            $this->BebidasArray[$bebida->getNome()] = $bebida;
            $this->SalvarNoArquivo();
        }


    public function excluirBebida($nome){
        
      if($this->BebidasArray[$nome]){
        unset($this->BebidasArray[$nome]);
      }
    $this->SalvarNoArquivo();  
    }


    public function atualizarBebida($nome, $valor, $Qtde){
        if(isset($this->BebidasArray[$nome])){
            $this->BebidasArray[$nome]->setNome($nome);          
            $this->BebidasArray[$nome]->setValor($valor);
            $this->BebidasArray[$nome]->setQtde($Qtde);
        }
        $this->SalvarNoArquivo();
    }

    public function ListarBebida(){
        return $this->BebidasArray;
    }

}
