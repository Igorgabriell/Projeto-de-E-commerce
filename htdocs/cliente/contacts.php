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
    $sql = 'SELECT user_email,user_phone FROM tbl_users WHERE  user_id = ' . $id;
    $res = $conn->query($sql);
    $show = $res->fetch_assoc();


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
                            <a href="/cliente/contacts.php" class="list-group-item list-group-item-action bg-dark text-light">
                                <i class="bi-mailbox fs-6"></i> Contatos
                            </a>
                                 <a href="/cliente/address.php" class="list-group-item list-group-item-action">
                                <i class="bi-house-door fs-6"></i> Endereço
                            </a>
                            <a href="/cliente/carrinho/cliente.php" class="list-group-item list-group-item-action">
                                <i class="bi-truck fs-6"></i> Pedidos
                            </a>
                                 <a href="/cliente/passchange.php" class="list-group-item list-group-item-action">
                                <i class="bi-lock fs-6"></i> Alterar Senha
                            </a>
                            <a href="/login/logout.php" class="list-group-item list-group-item-action">
                                <i class="bi-door-open fs-6"></i> Sair
                            </a>
                        </div>
                    </div>
                    <div class="col-8">
                        <form action="" method="POST">
                            <div class="form-floating mb-3 col-md-8">
                            <label for="txtEmail">E-mail</label>
                                <input class="form-control" type="email" id="txtEmail" placeholder="" value="$show[user_email]" required readonly autofocus/>
                            </div>
                            <div class="form-floating mb-3 col-md-6">
                            <label for="txtTelefone">Telefone</label>
                                <input class="form-control" type="text" name="user_phone" id="txtTelefone" placeholder="" value="$show[user_phone]" onkeypress="$(this).mask('(00) 90000-0000')" required />
                            </div>    
                            <button type="submit" class="btn btn-dark" style="margin-left:15px;">Salvar Alterações</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </main>

HTML;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') :
        $user_phone = $_POST['user_phone'];

        if (!preg_match('#^\(\d{2}\) 9?[6789]\d{3}-\d{4}$#', $user_phone)) :
            echo '<div class="alert alert-danger col-2 mx-auto text-center">Numero Inválido</div>';

        else :

            $sql = "UPDATE tbl_users SET user_phone = '$user_phone' WHERE user_id = $id;";
            $conn->query($sql);
            header('location: contacts.php');

        endif;
    endif;


    echo <<<HTML
          
    $page_content;

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

HTML;
