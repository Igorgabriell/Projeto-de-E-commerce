<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="/style.css">


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/index.php"><img class="logoelric" src="/img/logoElric.png" alt="Logo Elric relogios"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  mr-auto" style=" font-size: 22px;">
        <li class="nav-item active">
          <a class="nav-link" href="/index.php">Inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active" style=" font-size: 22px;">
          <a class="nav-link" href="/about.php">Quem somos</a>
        </li>
        <li class="nav-item active" style=" font-size: 22px;">
          <a class="nav-link" href="/produto/product.php">Produtos</a>
        </li>
        <li class="nav-item active" style=" font-size: 22px;">
          <a class="nav-link" href="/contact/contact.php">Contatos</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0 " style=" font-size: 22px;" role="search" name="form_search" method="get" action="/busca/search.php">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar..." aria-label="Search" name="txtsearch">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
      </form>
      <ul class="navbar-nav">
        <li>
          <a class="nav-link active" href="/cliente/carrinho/cart.php"><span><i class="bi bi-bag"></i></span> Carrinho </a>
        </li>

        <?php if (empty($_SESSION['usuarioId'])) {    ?>

          <li><a class="nav-link active" style=" font-size: 22px;" href="/login/index.php"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
          <?php } else {

          if ($_SESSION['usuariotipo'] == 2) {

            $consult = $conn->query("SELECT user_name FROM tbl_users WHERE user_id = '$_SESSION[usuarioId]'");
            $show = $consult->fetch_assoc();

          ?>

            <li> <a class="nav-link active" href="/cliente/index.php"><?php echo $show['user_name'] ?></a></li>
            <li><a class="nav-link active" href="/login/logout.php"><i class="bi bi-box-arrow-in-left"></i> Sair</a></li>

          <?php } else { ?>
            <li><a class="nav-link active" href="/login/administrativo.php"><i class="bi bi-person-circle"></i> Admin</a></li>
            <li><a class="nav-link active" href="/login/logout.php"><i class="bi bi-box-arrow-in-left"></i> Sair</a></li>

        <?php }
        } ?>

      </ul>
    </div>
  </nav>