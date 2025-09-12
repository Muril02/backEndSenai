<?php

class Imovel{
    private $categoria;
    private $n_comodos;
    private $valor;
    private $estado_conser;

    public function __construct($categoria, $n_comodos, $valor, $estado_conser){
        $this->categoria = $categoria;
        $this->n_comodos = $n_comodos;
        $this->valor = $valor;
        $this->estado_conser = $estado_conser;
    }


}

class Casa extends Imovel{
    private $tem_quintal;

    public function __construct($categoria, $n_comodos, $valor, $estado_conser, $tem_quintal){
        parent::__construct($categoria, $n_comodos, $valor, $estado_conser);
        
        $this->tem_quintal= $tem_quintal;
    }

}


class Apartamento extends Imovel{
    private $andar;

    public function __construct($categoria, $n_comodos, $valor, $estado_conser, $andar){
        parent::__construct($categoria, $n_comodos, $valor, $estado_conser);

        $this->andar = $andar;
    }

}

// Crie uma sub classe chamada Escola com o atributo $seguimento

class Escola extends Imovel{
    private $seguimento;

    public function __construct($categoria, $n_comodos, $valor, $estado_conser, $seguimento){
        parent::__construct($categoria, $n_comodos, $valor, $estado_conser);

        $this->seguimento = $seguimento;
    }
}


// Crie uma classe filha chamada comércio com o atributo $categoria
class Comercio extends Imovel{

    private $tamanho;

    public function __construct($categoria, $n_comodos, $valor, $estado_conser, $tamanho){
        parent::__construct($categoria, $n_comodos, $valor, $estado_conser);

        $this->tamanho = $tamanho;
    }

}
