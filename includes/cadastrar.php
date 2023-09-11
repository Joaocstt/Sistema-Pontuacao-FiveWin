<?php 
$alertaSucesso = !empty($alertaSucesso) ? '<div class = "alerta-sucesso">'.$alertaSucesso.'</div>' : '';
$alertaErro = !empty($alertaErro) ? '<div class = "alerta">'.$alertaErro.'</div>' : ''
?>

<style>
.alerta  {
    color: red;
    margin-bottom: 10px;
}

.alerta-sucesso {
    color: green;
    margin-bottom: 10px;
}

</style>

<form method="POST">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <?= $alertaErro ?>
            <?= $alertaSucesso ?>
                <h4 class="card-title">Cadastrar Alunos</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Nome</label>
                        <input type="text" class="form-control" name="nome"  placeholder="Informe o nome do aluno" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Escola</label>
                        <select name="escola" class="form-control" id="exampleSelectGender" required>
                            <option value="">Selecione uma escola</option>
                            <option value="Gloria Pérez">Gloria Pérez</option>
                            <option value="Sebastião Pedrosa">Sebastião Pedrosa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Pontuação</label>
                        <input type="number" class="form-control" name="pontuacao" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn mr-2">Cadastrar</button>
                    <a href="index.php" type="submit" class="btn btn-outline-danger btn">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</form>