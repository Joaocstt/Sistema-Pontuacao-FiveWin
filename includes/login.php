<?php 
$alertaLogin = !empty($alertaLogin) ? '<div class = "alerta">'.$alertaLogin.'</div>' : '';
?>

<style>
  .alerta  {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}
</style>


<div class="container-scroller">
  
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <form method="POST">
                  <h3 class="text-center">ENTRAR</h3>
                <?= $alertaLogin ?>
                  <div class="form-group mt-4">
                    <input type="text" name="nome" class="form-control p_input" placeholder="Usuário">
                  </div>
                  <div class="form-group">
                    <input type="password" name="senha" class="form-control p_input" placeholder="Senha">
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="submit" name="Logar" class="btn btn-primary btn-block enter-btn">LOGAR</button>
                  </div>
                </form>
              </div>
            </div>
      </div>
    </div>

    