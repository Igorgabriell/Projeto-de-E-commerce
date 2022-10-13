<?php require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<body>

	<header>
		<?php require($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
	</header>

	<article>

		<div class="container-fluid">

			<?php if (!empty($_GET['cd'])) { //se não estiver vazia a variavel cd...

				$cd_watchs = $_GET['cd'];
				$consult = $conn->query("SELECT * FROM vw_watch where cd_watch = '$cd_watchs'");
				$show = $consult->fetch_assoc();
			} else {
				header("location:index.php");
			}; ?>

			<div class="row">

				<div class="col-sm-4 col-sm-offset-1">

					<h1>Detalhes do Produto</h1>

					<img src="img/<?php echo $show['photo']; ?>" class="img-fluid" style="width:100%;">

				</div>


				<div class="col-sm-7">
					<h2><?php echo $show['nm_watch']; ?></h2>

					<p><b>Descrição:</b><?php echo $show['ds_product']; ?></p>

					<p><b>Marca:</b><?php echo $show['label']; ?></p>

					<p><b>Preço:</b> R$ <?php echo number_format($show['price'], 2, ',', '.'); ?></p>

					<a href="/cliente/carrinho/cart.php?cd=<?php echo $show['cd_watch'];?>">
      <button class="btn btn-lg btn-block btn-success">
          <span><i class="bi bi-currency-dollar"></i> Comprar</span>
          </button>
          </a>
				</div>
			</div>
	</article>

	<?php require($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>