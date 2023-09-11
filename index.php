<?php

require "vendor/autoload.php";

use app\Entity\Aluno;

use app\DataBase\Pagination;


if(isset($_GET['busca'])) {
    $busca = strip_tags($_GET['busca']);
}



$condicoes = [
    !empty($busca) ? 'nome LIKE "%'.$busca. '%"' : null
  ];

$condicoes = array_filter($condicoes);

$where = implode(' AND ', $condicoes);



$quantidadeAlunos = Aluno::getQuantidadeAlunos("escola_gloria",$where);
$obPagination = new Pagination($quantidadeAlunos, $_GET['pagina'] ?? 1,10);
$alunos = Aluno::getAlunos("escola_gloria",$where, $order = "Colocacao", $obPagination->getLimit());


require "includes/header.php";
require "includes/listagem.php";
require "includes/footer.php";

