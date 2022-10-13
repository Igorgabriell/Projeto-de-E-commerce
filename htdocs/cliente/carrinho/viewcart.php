<div class="container-fluid">
	
	<div class="text-center" style="margin-top: 15px;">
		<h1>Carrinho de Compras</h1>
	</div>
	
	<?php
	
	$total = null; // variavel total que recebe valor nulo
    
    if(!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    // criando um loop para sessão carrinho recebe o $cd e a quantidade
    foreach ($_SESSION['carrinho'] as $cd => $qnt)  {
    $consult = $conn->query("SELECT * FROM tbl_watch WHERE cd_watch='$cd'");
    $show = $consult->fetch_assoc();

    $watch = $show['nm_watch'];  // variável que recebe o livro
    $preco = number_format(($show['price']),2,',','.'); // variável que recebe o preço
    $total += $show['price'] * $qnt; // variável que recebe preço * quantidade
	
	?>
	<div class="row d-flex justify-content-center" style="margin-top: 15px;">
		
		<div class="col-sm-1 col-sm-offset-1">
		<img src="/img/<?php echo $show['photo']; ?>" alt="imagem do relogio de bolso" class="img-fluid" style="width:100%">
		</div>
		
		<div class="col-sm-4">
			<h4 style="padding-top:20px"><?php echo $watch; ?></h4>
		</div>	
		
		
		<div class="col-sm-2">
			<h4 style="padding-top:20px">R$ <?php echo $preco; ?></h4>
		</div>		
		<div class="col-sm-2" style="padding-top:20px">
			<h4><?php echo $qnt; ?> </h4>
		</div>
		
		<div class="col-sm-1 col-xs-offset-right-1" style="padding-top:20px">
		
		<!--remove o item do carrinho pelo codigo -->
		<a href="/cliente/carrinho/removecart.php?cd=<?php echo $cd;?>">	
		<button class="btn btn-lg btn-block btn-danger">
		<span><i class="bi bi-x"></i></span>		
		</button>
			</a>
		</div> 
				
	</div>	
	
	
	<?php } ?>