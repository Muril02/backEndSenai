<?php

// Cenário 1

// Relações
// Turistas -> Pais
// Turistas -> Comida
// Turistas -> PraiaRio
// Pais -> Comida
// Pais -> PraiaRio

class Turistas
{

    public $QuantidadeTuristas;
    // public $Pais = new Pais("Angola", "Africa");
    // public $Comida = new Comida;
    // public $PraiaRio = new PraiaRio;

    public function __construct($QuantidadeTuristas)
    {
        $this->setTuristas($QuantidadeTuristas);
    }

    public function getTuristas()
    {
        return  `A quantidade de turistas é: $this->QuantidadeTuristas`;
    }

    public function setTuristas($QuantidadeRecebida)
    {
        $this->QuantidadeTuristas = abs((int) $QuantidadeRecebida);
    }

    public function Nadar()
    {
        return `Os $this->QuantidadeTuristas turistas estão nadando`;
    }

    public function Comer()
    {
        return `Os $this->QuantidadeTuristas turistas estão comendo`;
    }

    public function PegarInfos()
    {
        $Pais = new Pais("Angola", "Africa");
        $Comida = new Comida("Calulu", "Salgado", "Angola");
        $PraiaRio = new PraiaRio("Rio Kwanza", null, "1000km");
        $NomePais = $Pais->getNome();
        $NomeComida = $Comida->getNomeComida();
        $NomeRioPraia = $PraiaRio->getPraiaNome() ? $PraiaRio->getPraiaNome() : $PraiaRio->getRioNome();
    }
}


class Pais
{

    public $Nome;
    public $Continente;

    public function __construct($nome, $continente)
    {
        $this->setNome($nome);
        $this->setContinente($continente);
    }


    public function getNome()
    {
        return $this->Nome;
    }

    public function getContinente()
    {
        return $this->Continente;
    }

    public function setNome($valorRecebido)
    {
        $this->Nome = ucwords(strtolower($valorRecebido));
    }

    public function setContinente($valorRecebido)
    {
        $this->Continente = ucwords(strtolower($valorRecebido));
    }
}
class Comida
{

    public $NomeComida;
    public $TipoComida;
    public $PaisTipico;

    public function __construct($nomeComida, $tipoComida, $paisTipico)
    {
        $this->setNomeComida($nomeComida);
        $this->setTipoComida($tipoComida);
        $this->setPaisTipico($paisTipico);
    }

    public function getNomeComida()
    {
        return $this->NomeComida;
    }
    public function getTipoComida()
    {
        return $this->TipoComida;
    }

    public function setNomeComida($valor)
    {
        $this->NomeComida = ucwords(strtolower($valor));
    }
    public function setTipoComida($valor)
    {
        $this->TipoComida = ucwords(strtolower($valor));
    }
    public function setPaisTipico($valor)
    {
        $this->PaisTipico = ucwords(strtolower($valor));
    }
}

class PraiaRio
{

    public $RioNome;
    public $PraiaNome;
    public $Tamanho;

    public function __construct($rioNome, $praiaNome, $tamanho)
    {
        $this->setPraiaNome($praiaNome);
        $this->setRioNome($rioNome);
        $this->setTamanho($tamanho);
    }

    public function getPraiaNome()
    {
        return $this->PraiaNome;
    }

    public function getRioNome()
    {
        return $this->RioNome;
    }
    public function getTamanho()
    {
        return $this->Tamanho;
    }


    public function setRioNome($valorRecebido)
    {
        $this->RioNome = ucwords(strtolower($valorRecebido));
    }

    public function setPraiaNome($valorRecebido)
    {
        $this->PraiaNome = ucwords(strtolower($valorRecebido));
    }
    public function setTamanho($valorRecebido)
    {
        $this->Tamanho = ucwords(strtolower($valorRecebido));
    }
}


// Exercicio 2

class Herois{
    public $Nome;

    
}
