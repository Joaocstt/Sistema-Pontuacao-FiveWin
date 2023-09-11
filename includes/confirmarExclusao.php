<main>
    <div class="col-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Deletar Aluno</h4>

                <form method="POST">
       
                    <div class="form-group mt-2">
                        <h6>Você deseja realmente excluir o Aluno <strong><?php echo $obAluno->Nome; ?></strong>?</h6>
                    </div>

                    <div class="form-group mt-4">

                        <a href="index.php" class="btn btn-success" href="#" role="button">Cancelar</a>
                        <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
                    </div>

            </form>
            </div>
        </div>
    </div>

</main>
