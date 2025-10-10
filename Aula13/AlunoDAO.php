<?php

Class AlunoDAO{
    private $alunos = [];
    public function criarAluno(Aluno $aluno){
        $this->alunos[$aluno->getId()] = $aluno;
    }
    public function listarAluno(){
        return $this->alunos;
    }
    public function atualizarAluno(){

    }
    public function excluirAluno(){

    }
}