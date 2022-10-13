<?php
session_start();
if (empty($_SESSION['usuarioId'])) die(header('location:/'));
$id = $_SESSION['usuarioId'];
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <title>Cliente</title>

    <header>
        <?php

        require($_SERVER['DOCUMENT_ROOT'] . "/header.php")
        ?>
    </header>

    <?php

    $page_content = <<<HTML

  <main class="flex-fill">
      <div class="container">
          <br>
          <h1>Minha Conta</h1>
          <div class="row gx-3">
              <div class="col-4">
              <div class="list-group">
                            <a href="index.php" class="list-group-item list-group-item-action">
                                <i class="bi-person fs-6"></i> Dados Pessoais
                            </a>
                            <a href="/cliente/contacts.php" class="list-group-item list-group-item-action">
                                <i class="bi-mailbox fs-6"></i> Contatos
                            </a>
                                 <a href="/cliente/address.php" class="list-group-item list-group-item-action">
                                <i class="bi-house-door fs-6"></i> Endereço
                            </a>
                            <a href="/cliente/carrinho/cliente.php" class="list-group-item list-group-item-action">
                                <i class="bi-truck fs-6"></i> Pedidos
                            </a>
                                 <a href="/cliente/passchange.php" class="list-group-item list-group-item-action bg-dark text-light">
                                <i class="bi-lock fs-6"></i> Alterar Senha
                            </a>
                            <a href="/login/logout.php" class="list-group-item list-group-item-action">
                                <i class="bi-door-open fs-6"></i> Sair
                            </a>
                  </div>
              </div>
              <div class="col-8">
                        <form class="col-sm-12 col-md-8 col-lg-6" action="" method="POST">
                            <div class="form-floating mb-3">
                                <input type="password" name ="current_password" id="txtSenhaAtual" required class="form-control" placeholder=" " autofocus>
                                <label for="txtSenhaAtual">Digite aqui sua senha atual</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name ="new_password" id="txtSenha" class="form-control" required placeholder=" ">
                                <label for="txtSenha">Digite aqui sua nova senha</label>
                            </div>
    
                            <div class="form-floating mb-3">
                                <input type="password" name ="confirm" id="txtConfSenha" class="form-control" required placeholder=" ">
                                <label for="txtConfSenha">Redigite aqui a nova senha</label>
                            </div>
    
                            <button type="submit" class="btn btn-dark">Alterar Senha</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>


 HTML;


    if ($_SERVER['REQUEST_METHOD'] == "POST") :

        $current_password = SHA1($_POST['current_password']);
        $new_password = SHA1($_POST['new_password']);
        $confirm =  SHA1($_POST['confirm']);




        if (empty($current_password) or empty($new_password) or empty($confirm)) :
            echo <<<HTML
    <div class="alert alert-danger col-4 mx-auto text-center" role="alert">
    Preencha todos os campos
    </div>
    HTML;

        else :

            $sql = <<<SQL
            SELECT user_pass FROM tbl_users WHERE user_pass = '$current_password' AND user_id = $id
SQL;

            $res = $conn->query($sql);

            if ($res->num_rows != 1) :
                echo <<<HTML
                <div class="alert alert-danger col-4 mx-auto text-center" role="alert">
                Senha Atual incorreta!
                </div>
                HTML;

            elseif ($new_password != $confirm) :
                echo <<<HTML
                <div class="alert alert-danger col-4 mx-auto text-center" role="alert">
               A senha não coincide com a confirmação! 
                </div>
            HTML;

            else :
                $sql = "UPDATE tbl_users SET user_pass = '$new_password' WHERE user_id = $id";
                $res = $conn->query($sql);
                echo <<<HTML
        <div class="alert alert-success col-4 mx-auto text-center" role="alert">
        Senha Alterada com sucesso!
        </div>  
        HTML;

            endif;
        endif;

    endif;


    echo <<<HTML
          
 $page_content;

<script src="script.js"></script>
HTML;
