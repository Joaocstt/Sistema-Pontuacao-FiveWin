<?php
$paginas = $obPagination->getPages();
?>

<style>
    .alerta {
        color: red;
        margin-bottom: 10px;
    }

    .alerta-sucesso {
        color: green;
        margin-bottom: 10px;
    }

    .btn-primary,
    .btn-danger,
    .btn-outline-primary {
        background-color: transparent;
        border: 1px solid #162f81;
    }
</style>

<form method="GET">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Consulta Sebastião Pedrosa</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Nome</label>
                        <input type="text" class="form-control" name="busca" placeholder="Digite o nome para filtrar " value="<?php if (isset($consulta)) echo $consulta; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Consultar</button>
                </form>
            </div>

            <div class="card-body">
                <h4 class="card-title">Resultados</h4>
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Escola</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($estudantes)) :
                            ?>
                                <tr>
                                    <td colspan="3">Nenhum aluno encontrado!</td>
                                </tr>

                            <?php endif; ?>

                            <?php foreach ($estudantes as $aluno) : ?>
                                <tr>
                                    <td><?= $aluno->Nome ?></td>
                                    <td><?= $aluno->Escola ?></td>
                                    <td>
                                        <a class="btn btn-outline-primary btn mr-4" href="editar2.php?id=<?= $aluno->ID ?>">Editar</a>
                                        <a class="btn btn-outline-danger" href="deletar2.php?id=<?= $aluno->ID ?>" data-toggle="modal" data-target="#myModal">Deletar</a>
                                    </td>

                                    <div class="modal fade" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- Cabeçalho da Modal -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Confirmação de exclusão</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Corpo da Modal -->
                                                <div class="modal-body">
                                                    Tem certeza de que deseja deletar?
                                                </div>

                                                <!-- Rodapé da Modal -->
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="deletar2.php?id=<?= $aluno->ID ?>">Sim</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>

<section class="mt-2 ml-4">
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