<?php require($_SERVER['DOCUMENT_ROOT'] .'/config.php');
session_start(); 
?>
<body>

<header>
<?php require($_SERVER['DOCUMENT_ROOT'] .'/header.php')?>
</header>

<article>

<?php require($_SERVER['DOCUMENT_ROOT'] .'/gallery.php')?>

<?php require($_SERVER['DOCUMENT_ROOT'] .'/tumb.php')?>

<?php $consult = $conn->query('SELECT cd_watch, photo, nm_watch, price, qt_store FROM vw_watch');?>

<div class="container-fluid">
  <div class="row">
    <?php  while($show = $consult->fetch_assoc()) { ?>
    <div class="col-sm-3">
      <img src="<?php echo $show['photo'];?>" class="img-fluid" style="width:100%">
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
</article>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php require($_SERVER['DOCUMENT_ROOT'] .'/footer.php')?>