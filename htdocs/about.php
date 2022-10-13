<?php require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/style.css">
  <script src="https://kit.fontawesome.com/bf7e05c402.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <title>Relogios de bolso</title>
</head>

<body>

  <header>
    <?php require($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
  </header>

  <div id="about-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h3 class="main-title">Sobre a Relógios Elric</h3>
        </div>
        <div class="col-md-6">
          <img class="img-fluid" src="img/logo_about.png" alt="logo Elric relogios">
        </div>
        <div class="col-md-6">
          <h3 class="about-title">A maior empresa de relogios de bolsos</h3>
          <p>Elric relógios é um e-commerce que se propõe a oferecer os melhores
            relógios de bolso para o público brasileiro. Nós estamos baseados no
            Rio de Janeiro e trabalhamos com serviço de dropshipping.</p>
          <p> A loja foi fundada em 2022 e tem como missão pôr os relógios de bolso em alta no
            mercado novamente. Nós acreditamos que a elegância das eras não podem
            ser perdidas, e os relógios de bolso são a marca de uma elegância de
           séculos passados dos quais nós tiramos a nossa fonte.</p>
          <p>A classe
            e a beleza não podem ser perdidas, e estas são achadas nos relógios de
            bolso da Elric. Navegue por nossa loja, conheça as marcas com as quais
            trabalhamos e sinta-se atraído pelos melhores relógios que alguém pode
            ter no século XXI.</p>
        </div>
      </div>
    </div>
  </div>

  <?php require($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>