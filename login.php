<?php 


require "vendor/autoload.php";

use app\session\Login;
  use app\Entity\Admin;

  Login::requireLogout();

  // Mensagem de alerta
  $alertaLogin = '';
  $alertaSucesso = '';


  if(isset($_POST['Logar'], $_POST['senha'], $_POST['nome'])) {

    $obUsuario = Admin::getUsuarioPorEmail($_POST['nome']);


    if(!$obUsuario instanceof Admin ||  $obUsuario->Senha !== $_POST['senha']) {
        $alertaLogin = 'Usuário ou senha inválidos';
    }
    else {
        $alertaSucesso = 'Logado com sucesso';

        Login::login($obUsuario);
    }

  }

  include __DIR__.'/includes/header.php';
  include __DIR__.'/includes/login.php';
  include __DIR__.'/includes/footer.php';

 ?>
