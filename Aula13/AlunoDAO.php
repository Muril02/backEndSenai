<?php
// namespace Aula13;

use Aluno;

Class AlunoDAO{
    private $alunos = [];
    public function criarAluno(Aluno $aluno){
        $this->alunos[$aluno->getId()] = $aluno;
    }
    public function listarAluno(){
        return $this->alunos;
        var_dump($this->alunos);
    }
    public function atualizarAluno($id, $novoNome,$novoCurso){
        // Método update -> para atualizar informações de um objeto ja existente
        if(isset($this->alunos[$id])) {
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);
        }
    }
    public function excluirAluno($id){
        unset($this->alunos[$id]);
    }
    
    // var_dump($alunos);
}

// require_once "RelacionamentoClasses.php";
// $aluno1 = new Aluno(1,"NomeBom","CursoBom" );

// $teste = new AlunoDAO();
// $teste->criarAluno($aluno1);
// $teste->listarAluno();
// var_dump($teste->alunos);

// AlunoDAO->criarAluno("1", "Teste", "CursoBom");