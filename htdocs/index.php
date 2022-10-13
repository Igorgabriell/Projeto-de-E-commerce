<?php require($_SERVER['DOCUMENT_ROOT'] .'/config.php');
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Relogios de bolso</title>
</head>
<body>

<header>
<?php require($_SERVER['DOCUMENT_ROOT'] .'/header.php')?>
</header>

<?php $consult = $conn->query('SELECT cd_watch,photo,nm_watch,price,qt_store FROM vw_watch'); ?>

<article>

<?php require($_SERVER['DOCUMENT_ROOT'] .'/gallery.php')?>


  <!-- Serviços da empresa -->
  <div id="services-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <hr>
            </div>
            <div class="col-md-4 service-box">
            <i class="bi bi-coin"></i>
              <h4>Preços Incríveis</h4>
              <p>Os melhores preços em mais de 18 de produtos.</p>
            </div>
            <div class="col-md-4 service-box">
            <i class="bi bi-credit-card"></i>
              <h4>E-commerces</h4>
              <p>Pague com os métodos mais conhecidos e confiáveis do mundo.</p>
            </div>
            <div class="col-md-4 service-box">
            <i class="bi bi-shield-check"></i>
              <h4>Compre com Confiança</h4>
              <p>Nossa Proteção ao Consumidor protege a sua compra do clique à entrega.</p>
            </div>
            <div class="col-12">
                <hr>
            </div>
        </div>
      </div>

         <!-- Portfólio -->
         <div id="portfolio-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h3 class="main-title">Conheça alguns de nossos lançamentos:</h3>
             </div>

 <?php $consult = $conn->query('SELECT cd_watch,photo,nm_watch,price,qt_store FROM vw_watch WHERE sg_new = "S"'); ?>

<div class="container-fluid">
  <div class="row">
    <?php  while($show = $consult->fetch_assoc()) { ?>
    <div class="col-sm-4">
      <img src="img/<?php echo $show['photo']; ?>" alt="imagem do relogio de bolso" class="img-fluid" style="width:100%">
      <div><h4><?php echo mb_strimwidth($show['nm_watch'],0,26,'...'); ?></h4></div>
      <div><h5>R$ <?php echo number_format($show['price'],2,',','.'); ?></h5></div>
    
      <div class="text-center">
        <a href="/detalhes.php?cd=<?php echo $show['cd_watch'];?>">
          <button class="btn btn-lg btn-block btn-light">
          <span><i class="bi bi-info-circle"></i> Detalhes</span>
          </button>
          </a>
      </div>

      <div class="text-center" style="margin-top:5px; margin-bottom: 5px;">
      <?php if($show['qt_store'] > 0) { ?>
        <a href="/cliente/carrinho/cart.php?cd=<?php echo $show['cd_watch'];?>">
      <button class="btn btn-lg btn-block btn-success">
          <span><i class="bi bi-currency-dollar"></i> Comprar</span>
          </button>
          </a>

        <?php } else { ?>

          <button class="btn btn-lg btn-block btn-danger" disabled>
          <span><i class="bi bi-x-circle"></i> Indisponível</span>
          </button>

          <?php } ?>

      </div>


    </div>

   <?php } ?> 
  </div>
</div>
        </div>
      </div>
</div>

 <div id="apply-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 apply-box" id="company-img"></div>
            <div class="col-md-6 apply-box" id="pattern-img">
              <h4>Gostou  dos nossos produtos?</h4>
              <p>Temos vários produtos, de diversas cores e modelos, com preços acessiveis para todos.</p>
              <p>Clique no botão abaixo e confira os nossos diversos produtos.</p>
              <div class="col-sm-4">
              <a href="/produto/product.php">
              <button class="btn btn-lg btn-block btn-info">
          <span><i class="bi bi-cart"></i> Veja mais</span>
          </button>
          </a>
          </div>
            </div>
          </div>
        </div>
  </div>


</article>

<?php require($_SERVER['DOCUMENT_ROOT'] .'/footer.php')?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>