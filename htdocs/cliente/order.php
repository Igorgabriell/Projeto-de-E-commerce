<?php
session_start();
if (empty($_SESSION['usuarioId'])) die(header('location:/'));
$id = $_SESSION['usuarioId'];
require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .navbar {
            margin-bottom: 0;
        }
    </style>

<body>

    <?php

    require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/header.php');

    $conteudo = <<<HTML
<h2>Página em construção. Retorne outro dia... </h2>
			
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
                            <a href="/cliente/carrinho/cliente.php" class="list-group-item list-group-item-action bg-dark text-light">
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
	
HTML;
    echo $conteudo;

    ?>