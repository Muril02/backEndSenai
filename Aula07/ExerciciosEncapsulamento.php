<?php


// Exercicio 1
 class Carro{

    private $marca;
    private $modelo;

    public function __construct($marca, $modelo){
        $this->setMarca($marca);
        $this->setModelo($modelo);
    }

    public function setMarca($marca){
        $this->marca = ucwords(strtolower($marca));
    }
    
    public function setModelo($modelo){
        $this->modelo = ucwords(strtolower($modelo));
    }

    public function getMarca(){
        return "O seu carro é da marca $this->marca\n";
    }
    public function getModelo(){
        return "O seu carro é do modelo $this->modelo\n";
    }
}


// $carro1 = new Carro("volKsWAGEN", "gol");
// echo $carro1->getMarca();
// echo $carro1->getModelo();


// Exercicio 2

class Pessoas{
    private $nome;
    private $idade;
    private $email;

    public function __construct($nome, $idade, $email){
        $this->setNome($nome);
        $this->setIdade($idade);
        $this->setEmail($email);
    }


    public function setNome($nome){
        $this->nome = ucwords(strtolower($nome));
    }
    public function setIdade($idade){
        $this->idade = ucwords(strtolower($idade));
    }
    public function setEmail($email){
        $this->email = ucwords($email);
    }

    public function getGeral(){
        return "O nome é $this->nome, tem $this->idade anos e o email é $this->email";
    }
}


// $pessoa1 = new Pessoas("Ronaldo", 20, "emailcabuloso@gemeai.com");
// echo $pessoa1->getGeral();


// Ex 3

class Aluno {

    private $nome;
    private $nota;

    public function __construct($nome, $nota){
        $this->setNota($nota);
        $this->setNome($nome);
    }


    public function setNota($valorNotaRecebido){
        $this->nota = $valorNotaRecebido >= 0 && $valorNotaRecebido <= 10 ? $valorNotaRecebido : "Nota não está nos parâmetros";
    }
    public function setNome($valorNomeRecebido){
        $this->nome = ucwords(strtolower($valorNomeRecebido)) ;
    }

    public function getGeral(){
        return "O aluno $this->nome ficou com o resultado: $this->nota\n";
    }

}

// $aluno1 = new Aluno("Robson", -4);
// $aluno2 = new Aluno("Givanildo", 5);
// echo $aluno1->getGeral();
// echo $aluno2->getGeral();

// Ex 4


class Produto{

    private $nome;
    private $preco;
    private $estoque;

    public function __construct($nome, $preco, $estoque){
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setEstoque($estoque);
    }

    public function setNome($nomeRecebido){
        $this->nome = ucwords(strtolower($nomeRecebido));
    }
    public function setPreco($precoRecebido){
        $this->preco = gettype($precoRecebido) == "integer" ? "R$ $precoRecebido" : "O valor recebido não é válido";
    }
    public function setEstoque($estoqueRecebido){
        $this->estoque = gettype($estoqueRecebido) == "integer" ?  $estoqueRecebido : "O valor recebido não é válido";
    }

    public function getGeral(){
        return "O produto $this->nome custa $this->preco e possui $this->estoque em estoque";
    }

}

// $prod1 = new Produto("Arroz", 20, 500);
// echo $prod1->getGeral();



// EX 5

class Funcionario{

    private $nome;
    private $salario;

    public function __construct($nome, $salario){
        $this->setNome($nome);
        $this->setSalario($salario);
    }


    public function setNome($nomeRecebido){
        $this->nome = ucwords(strtolower($nomeRecebido));
    }
    public function setSalario($salarioRecebido){
        $this->salario = (Float)$salarioRecebido; 
    }
    public function setAltNome($nomeAlterado){
        $this->nome = $nomeAlterado;
    }
    public function setAltSalario($salarioAlterado){
        $this->salario = $salarioAlterado;
    }

    public function getGeral(){
        return "O funcionário $this->nome recebe um sálario de R$$this->salario";
    }
}

// $funcionario1 = new Funcionario("jailsoN", 50558.90);
// $funcionario1->setAltSalario(1000000.5036);
// $funcionario1->setAltNome("Não sei");
// echo $funcionario1->getGeral();
