<?php require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
session_start();
?>
<!doctype html>

<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<title>Relogios de bolso</title>
</head>

<body>

	<header>
		<?php require($_SERVER['DOCUMENT_ROOT'] . '/header.php'); ?>
	</header>

	<?php

	$total = '';

	// verificando se usuário está logado
	if (empty($_SESSION['usuarioId'])) {

		header('location:/login/index.php'); // enviando para formlogon.php

	}

	// verificando se o codigo do produto NÃO está vazio
	if (!empty($_GET['cd'])) {

		// inserindo o código do produto na variável $cd_prod
		$cd_prod = $_GET['cd'];

		// se a sessão carrinho não estiver preenchida(setada)
		if (!isset($_SESSION['carrinho'])) {
			// será criado uma sessão chamado carrinho para receber um vetor
			$_SESSION['carrinho'] = array();
		}

		// se a variavel $cd_prod não estiver setado(preenchida)
		if (!isset($_SESSION['carrinho'][$cd_prod])) {

			// será adicionado um produto ao carrinho
			$_SESSION['carrinho'][$cd_prod] = 1;
			header('location: /cliente/carrinho/cart.php');
		}

		// caso contrario, se ela estiver setada, adicione novos produtos
		else {
			$_SESSION['carrinho'][$cd_prod] += 1;
			header('location: /cliente/carrinho/cart.php');
		}
		// incluindo o arquivo 'viewcart.php'
		require($_SERVER['DOCUMENT_ROOT'] . '/cliente/carrinho/viewcart.php');
	} else {

		//mostrando o carrinho	vazio	
		require($_SERVER['DOCUMENT_ROOT'] . '/cliente/carrinho/viewcart.php');
	}

	?>
	<div class="row d-flex justify-content-center">
		<!-- exibindo o valor da variavel total da compra -->
		<div class="row text-center" style="margin-top: 15px;">
			<h1>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?> </h1>
		</div>


		<div class="row text-center" style="margin-top: 15px; margin-left:20px; margin-right:20px">
			<a href="/produto/product.php"><button class="btn btn-lg btn-primary">Continuar Comprando</button></a>

			<?php
			if (count($_SESSION['carrinho']) > 0) { ?>
				<div class="row text-center" style="margin-left:20px; margin-right:20px">
					<a href="/cliente/carrinho/finishbuy.php"><button class="btn btn-lg btn-success">Finalizar Compra</button></a>
				</div>
			<?php } ?>
		</div>
	</div>
	</div>


	<?php require($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>