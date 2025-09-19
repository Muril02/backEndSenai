<?php 

class eletrodomestico {
	private $voltagem;
	private $descricao;
	private $potencia;
	private $nome;
	private $preco;

	
public function __construct($voltagem, $descricao, $potencia, $nome, $preco){
       $this->setVoltagem($voltagem);
       $this->setDescricao($descricao);
       $this->setPotencia($potencia);
       $this->setNome($nome);
       $this->setPreco($preco);
}

public function setVoltagem($volts) {
	$this->voltagem = preg_replace('/\D/', '', $volts);
}

public function setDescricao($valor){
	$this->descricao = ucwords(strtolower($valor));
}

public function setNome($nomeRecebido){
	$this->nome =  ucwords(strtolower($nomeRecebido));
}

public function setPreco($Npreco){
	$this->preco = abs((double) $Npreco);
}

public function setPotencia($Npotencia){
	$this->potencia = preg_replace('/\D/', '', $Npotencia);
}
public function getDescricao(){
	return $this->descricao;
}


public function getVoltagem() {
	return $this->voltagem;
}

public function getNome(){
	return $this->nome;
}

public function getPreco() {
	return $this->preco;
}

public function getPotencia(){
	return $this->potencia;
}

public static function criarViaTerminal() {
        $nome = readline("Digite o nome do eletrodoméstico: ");
        $descricao = readline("Digite a descrição do eletrodoméstico: ");
        $voltagem = readline("Digite a voltagem do eletrodoméstico: ");
        $potencia = readline("Digite a potência do eletrodoméstico: ");
        $preco = readline("Digite o preço do eletrodoméstico: ");


        return new self($voltagem, $descricao, $potencia, $nome, $preco);
    }


public function exibirInfo() {
        return "infromacões do eletrodoméstico:\n Nome: $this->nome\n Preço: $this->preco \n Descrição: $this->descricao \n Voltagem: $this->voltagem\n Potência: $this->potencia\n";  
    }

}



$microondas = eletrodomestico::criarViaTerminal();
echo $microondas -> exibirInfo();
$geladeira = eletrodomestico::criarViaTerminal();
echo $geladeira -> exibirInfo();
$batedeira = eletrodomestico::criarViaTerminal();
echo $batedeira -> exibirInfo();

