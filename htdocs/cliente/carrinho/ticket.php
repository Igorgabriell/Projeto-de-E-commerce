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
	
	<?php
	
	if (empty($_SESSION['usuarioId'])) {
		
		header('location:/login/index.php');
		
	}
	
	//jogando na variavel $ticket_compra o ticket recebido pelo parametro
	$ticket_compra=$_GET['ticket'];
	
	//Criando select pelo ticket recebido que foi armazenado na variavel $ticket_compra
	$consultSale = $conn->query("SELECT * FROM vw_venda WHERE nb_ticket='$ticket_compra'");
	
	
	?>
	
<div class="container-fluid">
	
	
	<div class="row" style="margin-top: 15px;">
		
		<h1 class="text-center">Compra: <?php echo $ticket_compra ?></h1>
		
	</div>
	
	
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1"><h4>Data</h4> </div>
		<div class="col-sm-2"><h4>Ticket </h4></div>
		<div class="col-sm-5"><h4>Produto</h4></div>
		<div class="col-sm-1"><h4>Quant</h4></div>
		<div class="col-sm-2"><h4>Preço</h4></div>
		
				
	</div>
	
	
	<?php
	
	$total=0; // criando variavel chamado total
			
	while ($showSale = $consultSale->fetch_assoc()) {		
		
		$total += $showSale['vl_total_item'];
	
	?>
	
	<div class="row" style="margin-top: 15px;">		
		<div class="col-sm-1 col-sm-offset-1"><?php echo date('d/m/Y',strtotime($showSale['dt_order']));?></div>
		<div class="col-sm-2"><?php echo $showSale['nb_ticket'];?></div>
		<div class="col-sm-5"><?php echo $showSale['nm_watch'];?></div>
		<div class="col-sm-1"><?php echo $showSale['qt_product'];?></div>
		<div class="col-sm-2"><?php echo number_format($showSale['vl_total_item'],2,',','.');?></div>				
	</div>	
	<?php } ?>
	
	<div class="row" style="margin-top: 15px;">
		<h2 class="text-center">Total desta compra: R$ <?php echo number_format($total,2,',','.');?></h2>
	</div>
	
</div>
	
<?php require($_SERVER['DOCUMENT_ROOT'] .'/footer.php')?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
</body>
</html>