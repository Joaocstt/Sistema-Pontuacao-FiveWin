<?php

require "vendor/autoload.php";

use app\DataBase\Pagination;
use app\Entity\Aluno;




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
$alunos = Aluno::getAlunos("escola_sebastiao",$where, $order = "Colocacao", $obPagination->getLimit());




require "includes/header.php";
require "includes/listagemPedrosa.php";
require "includes/footer.php";

