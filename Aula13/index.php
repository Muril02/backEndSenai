<?php


require_once "AlunoDAO.php";
require_once "RelacionamentoClasses.php";

$dao = new AlunoDAO();

// Create 
$dao->criarAluno(new Aluno(1, "Gerso", "Empilhadeira"));
$dao->criarAluno(new Aluno(2, "Robso", "Fumar cigarro"));
$dao->criarAluno(new Aluno(3, "Tonho", "Dar drift de del rey"));
$dao->criarAluno(new Aluno(4, "Aurora", "Cair de bike"));
$dao->criarAluno(new Aluno(5, "Oliver", "Comprar mulheres em leilão"));
$dao->criarAluno(new Aluno(6, "Amanda", "Cuidar de casa monstro"));
$dao->criarAluno(new Aluno(7, "Geysa", "Engenharia"));
$dao->criarAluno(new Aluno(8, "Joab", "Pedagogia"));
$dao->criarAluno(new Aluno(9, "Bernardo", "Streamer"));

$dao->listarAluno();


// Read

echo "Listagem inicial\n";

foreach($dao->listarAluno() as $aluno){
    echo "{$aluno->getId()}  {$aluno->getNome()} - {$aluno->getCurso()} \n";
}

// Update
$dao->atualizarAluno(1, "Gerso2", "Empilhadeira2");
$dao->atualizarAluno(2, "Ronaldo", "Fumar cigarro");
$dao->atualizarAluno(3, "Ronaldo", "Dar drift de del rey");
$dao->atualizarAluno(4, "Aurora", "Cair de bike");
$dao->atualizarAluno(5, "Oliver", "Eletrica");
$dao->atualizarAluno(6, "Amanda", "Logistica");
$dao->atualizarAluno(7, "Clotilde", "Engenharia");
$dao->atualizarAluno(8, "Joana", "Pedagogia");
$dao->atualizarAluno(9, "Bernardo", "Dev");

echo "\nApós atualização\n";
foreach($dao->listarAluno() as $aluno){
    echo "{$aluno->getId()}  {$aluno->getNome()} - {$aluno->getCurso()} \n";
}




// Delete
$dao->excluirAluno(1);
$dao->excluirAluno(7);
$dao->excluirAluno(4);

echo "\nApós exclusão \n";
foreach($dao->listarAluno() as $aluno){
    echo "{$aluno->getId()}  {$aluno->getNome()} - {$aluno->getCurso()} \n";
}