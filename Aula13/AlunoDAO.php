<?php
// namespace Aula13;

use Aluno;

Class AlunoDAO{
    private $alunos = [];

    private  $arquivo = "alunos.json"; // Cria o arquivo de json para que os dados sejam armazenados

    // construtor do alunoDAO -> Carrega os dados do arquivo ao iniciar a aplicação
    public function __construct(){
        if(file_exists($this->arquivo)){
            // Lê o conteúdo do arquivo caso ele já exista
            $conteudo = file_get_contents($this->arquivo); // Atribui as informações
            // do arquivo existente à variável $conteudo

            $dados = json_decode($conteudo, true);
            // Converte o JSON em um array associativo 

            if($dados){
                foreach($dados as $id => $info){ // Verifica se o array é nulo ou falso, caso seja válido 
                    // e contenha valores ele prossegue para a lógica dentro do if
                    $this->alunos[$id] = new Aluno(
                        $info['id'],
                        $info['nome'],
                        $info['curso']
                );
                }
            }
            var_dump($this->alunos);
        }
    }
    
    // Método auxiliar -> salva o array de alunos no arquivo
    private function salvarEmArquivo(){
        $dados = [];

        // Transforma os objetos em arrays convencionais 
        foreach($this->alunos as $id => $aluno){
            $dados[$id]=[
                'id' => $aluno->getId(),
                'nome' => $aluno->getNome(),
                'curso' => $aluno->getCurso()
            ];
        }
        // echo "Arquivo antes do encode\n";
        // var_dump($dados);
        
        // Converte para JSON formatado e grava o arquivo
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));
    }


    // CREATE
    public function criarAluno(Aluno $aluno){
        $this->alunos[$aluno->getId()] = $aluno;
        $this->salvarEmArquivo();
    }
    public function listarAluno(){
        return $this->alunos;
        // var_dump($this->alunos);
    }
    public function atualizarAluno($id, $novoNome,$novoCurso){
        // Método update -> para atualizar informações de um objeto ja existente
        if(isset($this->alunos[$id])) {
            $this->alunos[$id]->setNome($novoNome);
            $this->alunos[$id]->setCurso($novoCurso);
        }
        $this->salvarEmArquivo();
    }
    public function excluirAluno($id){
        unset($this->alunos[$id]);
        $this->salvarEmArquivo();
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