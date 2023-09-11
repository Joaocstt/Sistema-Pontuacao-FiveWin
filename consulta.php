<?php

require "vendor/autoload.php";


use app\Entity\Aluno;
use app\DataBase\Pagination;
use app\DataBase\dataBase;
use app\session\Login;


// Obriga o usuário está logado
Login::requireLogin();



$teste = new dataBase();


if(isset($_GET['filtro'])) {
    $busca = strip_tags($_GET['filtro']);
}

    $condicoes = [
        !empty($busca) ? 'nome LIKE "%'.$busca. '%"' : null
      ];
    
    $condicoes = array_filter($condicoes);
    
    $where = implode(' AND ', $condicoes);


        $quantidadeAlunos = Aluno::getQuantidadeAlunos("escola_gloria",$where);
        $obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1,7);
        $estudantes = Aluno::getAlunos("escola_gloria",$where, $order = "Colocacao", $obPagination->getLimit());

    


   
require "includes/header.php";
require "includes/consulta.php";
require "includes/footer.php";
