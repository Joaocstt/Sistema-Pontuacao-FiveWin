<?php 
use app\session\Login;
$usuarioLogado = Login::getUsuarioLogado();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>FiveWin - Pontuações</title>
  <script src="index.js" defer></script>
  <link rel="stylesheet" href="template/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="template/assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="template/assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="template/assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="template/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="template/assets/css/style.css">
  <link rel="shortcut icon" href="public/assets/mini-logo.png" />
</head>

<body>
  <div class="container-scroller">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <img class="img-logo" src="public/assets/logo.png" width="200px">
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="template/assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle " src="https://pm1.narvii.com/6511/713ea8475e05b05aead72aea3c96784e4d90d7ea_00.jpg" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <?php 
                  if(isset($usuarioLogado)): 
                ?>
                <h5 class="mb-0 font-weight-normal">Olá, <?= $usuarioLogado['nome']; ?>!</h5>
                <span>Admin</span>
                <?php 
                  else:
                ?>
                <h5 class="mb-0 font-weight-normal">Olá, Visitante</h5>

                <span>Padrão</span>
                <?php endif; ?>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <div class="dropdown-divider"></div>
              <?php 
                  if(!isset($usuarioLogado)): 
                ?>
              <a href="login.php" class="dropdown-item preview-item">
                  <div class="preview-icon bg-dark rounded-circle mr-2">
                    <i class="mdi mdi-account-box"></i>
                  </div>
                  <span>Painel de Controle</span>
              </a>
              <?php endif; ?>
              <?php if(isset($usuarioLogado)): ?>
              <a href="logout.php" class="dropdown-item preview-item">
                  <div class="preview-icon bg-dark rounded-circle mr-2">
                    <i class="mdi mdi-logout-variant"></i>
                  </div>
                  <span>Logout</span>
              </a>
              <?php endif; ?>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category">
          <span class="nav-link">Principal</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="index.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Pontuação</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-laptop"></i>
            </span>
            <span class="menu-title">Escola</span>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="index.php">Gloria Pérez</a></li>
              <li class="nav-item"> <a class="nav-link" href="index2.php">Sebastião Pedrosa</a>
              </li>
            </ul>
          </div>
        </li>
        <?php if(isset($usuarioLogado)): ?>
        <li class="nav-item nav-category">
          <span class="nav-link">Admin</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="true" aria-controls="auth">
            <span class="menu-icon">
              <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title">Gerenciar</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse show" id="auth" style="">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="admin.php">
                  <span class="menu-icon">
                    <i class="mdi mdi mdi-account-multiple-plus"></i>
                  </span>
                  <span>Cadastrar Aluno</span>
                </a>
              </li>
              <li class="nav-item"> <a class="nav-link" href="consulta.php">
                  <span class="menu-icon">
                    <i class="mdi mdi mdi-account-key"></i>
                  </span>
                  <span>Gloria Pérez</span>
                </a>
              </li>
              <li class="nav-item"> <a class="nav-link" href="consulta2.php">
                  <span class="menu-icon">
                    <i class="mdi mdi mdi-account-key"></i>
                  </span>
                  <span>Sebastião Pedrosa</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <img src="public/assets/logo.png" width="65px">

        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav w-100">
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <div class="main-panel">
      <div class="content-wrapper">