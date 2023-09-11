<?php

  require "vendor/autoload.php";

  use app\Entity\Aluno;
  use app\DataBase\dataBase;
  use app\session\Login;


  // Obriga o usuário está logado
  Login::requireLogin();

if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header("Location: index.php?status=error");
    exit;
}

$id = (int)$_GET['id'];

$obAluno =  Aluno::getAluno("escola_gloria",$id);

if(!$obAluno instanceof Aluno) {
    header("Location: index.php?status=error");
    exit;
  }

    $obAluno->excluir("escola_gloria",$id);

    $obData = new dataBase("escola_gloria");
    $obData->updateRankings();
    header("location: consulta.php?status=success");
    exit;
