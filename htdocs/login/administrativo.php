<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Relogios de bolso</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">
  <script src="js/ie-emulation-modes-warning.js"></script>
  <title>Administrativo</title>

  <header>
    <?php

    require($_SERVER['DOCUMENT_ROOT'] . "/header.php")
    ?>

  </header>

<body>
  <div class="container-fluid">

    <div class="row">

      <div class="col-sm-4 col-sm-offset-4 text-center">

        <h2>Área administrativa</h2>


        <a href="/admin_session/register.php">
          <button type="submit" class="btn btn-block btn-lg btn-primary">

            Incluir Produto

          </button>

        </a>
        <a href="/admin_session/">
          <button type="submit" class="btn btn-block btn-lg btn-warning">

            Visualizar Produtos

          </button>
        </a>
        <a href="/admin_session/edituser.php">
          <button type="submit" class="btn btn-block btn-lg btn-success">

            Gerenciamento de usuários

          </button>

        </a>
        <a href="/login/logout.php">
          <button type="submit" class="btn btn-block btn-lg btn-danger">

            Sair da área administrativa

          </button>
        </a>



      </div>
    </div>
  </div>


  <script src="js/ie10-viewport-bug-workaround.js"></script>


</body>

</html>