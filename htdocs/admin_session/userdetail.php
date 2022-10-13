<?php
session_start();
require($_SERVER['DOCUMENT_ROOT'] . "/config.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_users WHERE user_id = $id";
    $res = $conn->query($sql);
    $show = $res->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Relogios de bolso</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="css/signin.css" rel="stylesheet">
        <script src="js/ie-emulation-modes-warning.js"></script>
        <title>Administrativo</title>
    </head>

    <header>
        <?php

        require($_SERVER['DOCUMENT_ROOT'] . "/header.php");
        require($_SERVER['DOCUMENT_ROOT'] . "/config.php");
        ?>
    </header>

    <?php

    $birth = date("d/m/Y", strtotime($show['user_birth']));
    $page_content = <<<HTML
	
    <div class="container-fluid">

<div class="container">

    <div class="row justify-content-center">
            <form class="col-sm-10 col-md-8 col-lg-6" action="" method="POST"><br>
            <h2>Detalhar Usuário</h2>
            <div class="form-floating mb-3">
                <label >Nome</label>
                <input class="form-control" name="user_name" type="text" value="$show[user_name]" >
            </div>
            <div class="form-floating mb-3 ">
                <label >CPF</label>
                <input class="form-control" name="user_cpf" type="text" value="$show[user_cpf]" >            </div>
            <div class="form-floating mb-3">
                <label >Telefone</label>
                <input class="form-control" name="user_phone" type="text" value="$show[user_phone]" >            </div>
                <div class="form-floating mb-3">
                <label >Data de Nascimento</label>
                <input class="form-control" name="user_birth" type="text" value="$birth" >            </div>
            <div class="form-floating mb-3">
                <label >Endereço</label>
                <input class="form-control" name="user_address" type="text" value="$show[user_address]" >            </div>
            <div class="form-floating mb-3">
                <label >Cep</label>
                <input class="form-control" name="user_zipcode" type="text" value="$show[user_zipcode]" >            </div>
                <div class="form-floating mb-3">
                <label >Numero</label>
                <input class="form-control" name="user_number" type="text" value="$show[user_number]" >            </div>
                <div class="form-floating mb-3">
                <label >Complemento</label>
                <input class="form-control" name="user_complement" type="text" value="$show[user_complement]" >            </div>
                <div class="form-floating mb-3">
                <label >Referência</label>
                <input class="form-control" name="user_reference" type="text" value="$show[user_reference]" >            </div>
                <button type="submit" class="btn btn-dark">Salvar Alterações</button>

</form>
</div>
HTML;



    if ($_SERVER['REQUEST_METHOD'] == 'POST') :
        $user_name = $_POST['user_name'];
        $user_cpf = $_POST['user_cpf'];
        $user_birth = $_POST['user_birth'];
        $user_phone = $_POST['user_phone'];
        $user_address = filter_var($_POST['user_address'], FILTER_SANITIZE_SPECIAL_CHARS);
        $user_zipcode = filter_var($_POST['user_zipcode'], FILTER_SANITIZE_NUMBER_FLOAT);
        $user_number = filter_var($_POST['user_number'], FILTER_SANITIZE_NUMBER_FLOAT);
        $user_complement = filter_var($_POST['user_complement'], FILTER_SANITIZE_SPECIAL_CHARS);
        $user_reference = filter_var($_POST['user_reference'], FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($user_address) or empty($user_zipcode) or empty($user_number) or empty($user_complement) or empty($user_reference) or empty($user_name)) :
            header('location: address.php');

        elseif (!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $user_zipcode)) :
            echo '<div class="alert alert-danger col-2 mx-auto text-center">Cep Inválido</div>';

        else :
            $sql = "UPDATE tbl_users SET
user_address = '$user_address',
user_zipcode = '$user_zipcode',
user_number = '$user_number',
user_complement = '$user_complement',
user_reference = '$user_reference',
user_name = '$user_name',
user_cpf = '$user_cpf',
user_birth = '$user_birth',
user_phone = '$user_phone'
WHERE user_id = $id";

            $res = $conn->query($sql);


        endif;

    endif;



    echo <<<HTML
      
$page_content;

<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


HTML;
