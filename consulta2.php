<?php

require "app/session/Login.php";
require "app/DataBase/Pagination.php";
require "app/DataBase/dataBase.php";
require "app/Entity/Aluno.php";

use app\Entity\Aluno;
use app\DataBase\Pagination;
use app\DataBase\dataBase;
use app\session\Login;


// Obriga o usuário está logado
Login::requireLogin();



$teste = new dataBase();


if(isset($_GET['busca'])) {
    $busca = strip_tags($_GET['busca']);
}

    $condicoes = [
        !empty($busca) ? 'nome LIKE "%'.$busca. '%"' : null
      ];
    
    $condicoes = array_filter($condicoes);
    
    $where = implode(' AND ', $condicoes);
    $quantidadeAlunos = Aluno::getQuantidadeAlunos("escola_sebastiao",$where);
    $obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1,10);
    $estudantes = Aluno::getAlunos("escola_sebastiao",$where, $order = "Colocacao", $obPagination->getLimit());

    


   
require "includes/header.php";
require "includes/consulta2.php";
require "includes/footer.php";
