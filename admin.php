<?php 

require "vendor/autoload.php";


use app\Entity\Aluno;
use app\DataBase\dataBase;
use app\session\Login;


// Obriga o usuário está logado
Login::requireLogin();


$alertaSucesso = '';
$alertaErro = '';


    if(isset($_POST['nome'], $_POST['escola'], $_POST['pontuacao'])) {

        $nome = strip_tags($_POST['nome']);
        $pontuacao = (int)strip_tags($_POST['pontuacao']);
        $escola = strip_tags($_POST['escola']);

        if (empty($nome) || empty($pontuacao) || empty($escola)) {
            $alertaErro = "Os campos não podem ser vázios!";
    
        }
        else if (strlen($nome) <= 3) {
            $alertaErro = "O campo nome precisa ser maior do que 3 caracteres!";
        }
        else {
            if($_POST['escola'] == "Gloria Pérez") {

                $aluno = new Aluno;
                $aluno->nome = $nome;
                $aluno->pontuacao = $pontuacao;
                $aluno->escola = $escola;

                $aluno->register("escola_gloria");

                $alertaSucesso = "Aluno cadastrado com sucesso!";

                $obData = new dataBase("escola_gloria");
                $obData->updateRankings();
            }
            else {

                $aluno = new Aluno;
                $aluno->nome = $nome;
                $aluno->pontuacao = $pontuacao;
                $aluno->escola = $escola;

                $aluno->register("escola_sebastiao");

                $alertaSucesso = "Aluno cadastrado com sucesso!";

                $obData = new dataBase("escola_sebastiao");
                $obData->updateRankings();
            }
        }
    }


require "includes/header.php";
require "includes/cadastrar.php";
require "includes/footer.php";

