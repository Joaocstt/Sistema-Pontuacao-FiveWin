<?php 
$alertaSucesso = !empty($alertaSucesso) ? '<div class = "alerta-sucesso">'.$alertaSucesso.'</div>' : '';
$alertaErro = !empty($alertaErro) ? '<div class = "alerta">'.$alertaErro.'</div>' : '';
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
                <h4 class="card-title">Editar Aluno</h4>
                    <div class="form-group">
                        <label for="exampleInputName1">Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php if(isset($obAluno->Nome)) echo $obAluno->Nome; ?>"  placeholder="Informe o nome do aluno" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Escola</label>
                        <select name="escola" class="form-control" id="exampleSelectGender" required>
                            <option value="">Selecione uma escola</option>
                            <option value="Gloria Pérez" <?php if(isset($obAluno->Escola)) echo "SELECTED";  ?>>Gloria Pérez</option>
                            <option value="Sebastião Pedrosa">Sebastião Pedrosa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                    <a href="consulta.php" type="submit" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>