<?php


use app\Entity\Aluno;
use app\DataBase\dataBase;

if (isset($_POST['pontos'], $_POST['id'], $_POST['nome'])) {

  $obAluno = new Aluno;

  $obAluno->pontuacao = $_POST['pontos'];

  // Supondo que 'updatePoints' seja uma função que atualiza a pontuação no banco de dados.
  $obAluno->updatePoints("escola_sebastiao", $_POST['id']);

  $obData = new dataBase("escola_sebastiao");
  $obData->updateRankings();

  // Adicione um código JavaScript para redirecionar após a atualização.
  echo '<script>window.location.href = "index2.php";</script>';
}

$paginas = $obPagination->getPages();

?>

<div class="col-12">
  <div class="card">
    <div class="col-12 d-lg-none">
      <form class="nav-link mt-2 mt-md-0 search" method="GET">
        <input type="text" class="form-control" name="busca" placeholder="Nome para verificar sua pontuação">
      </form>
    </div>
    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" method="GET">
      <input type="text" class="form-control" name="busca" placeholder="Digite seu nome para verificar sua pontuação">
    </form>
    <div class="card-body">
      <h4 class="card-title">Pontuação Sebastião Pedrosa 🥇</h4>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Posição</th>
              <th>Nome</th>
              <th>Pontuação</th>
              <?php if(isset($usuarioLogado)): ?>
              <th>Gerenciar</th>
              <?php  endif; ?>
            </tr>
          </thead>
          <tbody>
            <?php
            if (empty($alunos)) :
            ?>
              <tr>
                <td colspan="3">Nenhum aluno encontrado!</td>
              </tr>
            <?php endif; ?>
            <?php foreach ($alunos as $aluno) : ?>
              <tr>
                <?php if ($aluno->Colocacao <= 3) : ?>
                  <td>
                    <div class="badge badge-outline-success"><?= $aluno->Colocacao . "º Lugar" ?></div>
                  </td>
                <?php elseif ($aluno->Colocacao > 3 && $aluno->Colocacao <= 5) : ?>
                  <td>
                    <div class="badge badge-outline-warning"><?= $aluno->Colocacao . "º Lugar" ?></div>
                  </td>
                <?php else : ?>
                  <td>
                    <div class="badge badge-outline-primary"><?= $aluno->Colocacao . "º Lugar" ?></div>
                  </td>
                <?php endif; ?>
                <td>
                  <span class="pl-2"><?= $aluno->Nome ?></span>
                </td>
                <td><?= $aluno->Pontuacao ?></td>
                <?php if(isset($usuarioLogado)): ?>
                <td>
                  <a class="btn btn-outline-primary" href="adicionar.php?id=<?= $aluno->ID ?>" data-toggle="modal" data-target="#myModal<?= $aluno->ID ?>">Adicionar</a>
                </td>
                <?php  endif; ?>
              </tr>

              <div class="modal fade" id="myModal<?= $aluno->ID ?>">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <!-- Cabeçalho da Modal -->
                    <div class="modal-header">
                      <h4 class="modal-title">Adicionar pontuação</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Corpo da Modal -->
                    <div class="modal-body">
                      <!-- Formulário -->
                      <form method="POST" action="">
                        <div class="form-group">
                          <label for="nome">Nome:</label>
                          <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno->Nome ?>" readonly>
                        </div>
                        <div class="form-group">
                          <label for="pontos">Pontuação:</label>
                          <input type="number" class="form-control" id="pontos" name="pontos">
                        </div>
                        <input type="hidden" name="id" value="<?= $aluno->ID ?>">
                        <!-- Rodapé da Modal -->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Adicionar Pontuação</button>
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <section class="mt-4">
        <?php
        unset($_GET['status']);
        unset($_GET['pagina']);

        $gets = http_build_query($_GET);
        ?>
        <?php foreach ($paginas as $pagina) : ?>
          <?php $class = $pagina['atual'] ? 'btn-primary' : 'btn-dark' ?>

          <a href="?pagina=<?= $pagina['pagina'] ?>&<?= $gets ?>"><button class="btn <?= $class ?>"><?= $pagina['pagina'] ?></button></a>
        <?php endforeach; ?>
      </section>
    </div>
  </div>
</div>


<style>
  .btn-primary {
    background-color: transparent;
    border: 1px solid #162f81;
  }

  /* Estilos para tabelas responsivas */
  .table-responsive {
    overflow-x: auto;
  }

  /* Estilos para tabelas em telas pequenas */
  @media (max-width: 535px) {
    .table-responsive table {
      width: 100%;
      display: block;
    }

    h4 {
      text-align: center;
    }

    .table-responsive thead {
      display: none;
      /* Oculta o cabeçalho em telas pequenas */
    }

    .table-responsive tbody {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    .table-responsive tr {
      width: 100%;
      margin-bottom: 10px;
      display: flex;
      flex-direction: column;
    }

    .table-responsive td,
    .table-responsive th {
      text-align: center !important;
      /* Alinha o texto à esquerda */
      margin-bottom: 5px;
    }
  }
</style>