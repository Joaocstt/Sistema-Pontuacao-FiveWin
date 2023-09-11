<?php 

require "vendor/autoload.php";

use app\Entity\Aluno;
use app\DataBase\dataBase;
use app\session\Login;


// Obriga o usuário está logado
Login::requireLogin();

$alertaSucesso = '';
$alertaErro = '';


if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }

  $id = (int)$_GET['id'];
  
  $obAluno =  Aluno::getAluno("escola_gloria",$id);

  if(!$obAluno instanceof Aluno){
    header('location: index.php?status=error');
    exit;
  }

    if(isset($_POST['nome'], $_POST['escola'])) {

        $nome = strip_tags($_POST['nome']);
        $pontuacao = (int)strip_tags($_POST['pontuacao']);
        $escola = strip_tags($_POST['escola']);

        if (empty($nome) || empty($escola)) {
            $alertaErro = "Os campos não podem ser vázios!";
    
        }
        else if (strlen($nome) <= 3) {
            $alertaErro = "O campo nome precisa ser maior do que 3 caracteres!";
        }
        else {
            if($_POST['escola'] == "Gloria Pérez") {

                $aluno = new Aluno;
                $aluno->nome = $nome;
                $aluno->escola = $escola;

               $aluno->update("escola_gloria", $id);

                $alertaSucesso = "Usuário editado com sucesso!";
                
                $obData = new dataBase("escola_gloria");
                
                $obData->updateRankings();
                header("location: consulta.php");
            }
            else {

                $aluno = new Aluno;
                $aluno->nome = $nome;
                $aluno->escola = $escola;

                $aluno->register("escola_sebastiao", $id);

                $aluno->excluir("escola_gloria", $id);

                $alertaSucesso = "Usuário editado com sucesso!";
                
                $obData = new dataBase("escola_sebastiao");
                $obData->updateRankings();

                header("location: consulta2.php");
            }
        }

        $obData1 = new dataBase("escola_gloria");
        $obData1->updateRankings();

        $obData2 = new dataBase("escola_sebastiao");
        $obData2->updateRankings();
    }


require "includes/header.php";
require "includes/editarGloria.php";
require "includes/footer.php";

